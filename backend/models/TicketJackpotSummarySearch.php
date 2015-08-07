<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TicketJackpotSummary;
use yii\data\ArrayDataProvider;

/**
 * TicketJackpotSummarySearch represents the model behind the search form about `app\models\TicketJackpotSummary`.
 */
class TicketJackpotSummarySearch extends TicketJackpotSummary
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'jackpot_id', 'user_id'], 'integer'],
            [['ticket_number', 'created_on', 'updated_on'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $ticketNumber = $jackpotprice = $ticketprice = $averageperson = 'NULL';
        if(!empty($params)){
            $ticketNumber = $params["ticketnumber"];
            $jackpotprice = $params["jackpotprice"];
            $ticketprice = $params["ticketprice"];
            $averageperson = $params["averageperson"];
        }
        $query = TicketJackpotSummary::find();
        
        if(!empty($params)){
        $data = (new \yii\db\Query())
        ->select('tjs.id as summaryid,cn.name as continentName,c.name as countryName,tjs.*,j.*,ur.*')
        ->from('ticket_jackpot_summary as tjs')
        ->join('LEFT OUTER JOIN', 'jackpot_details as j','tjs.jackpot_id = j.id')	
        ->join('LEFT OUTER JOIN', 'users_register as ur', 'tjs.user_id = ur.id')
        ->join('LEFT OUTER JOIN', 'countries as c', 'j.countryid = c.code')
        ->join('LEFT OUTER JOIN', 'continents as cn', 'j.continent = cn.code')
        ->orWhere(['tjs.ticket_number' => $ticketNumber])
        ->orWhere(['j.jackpot_price' => $jackpotprice])
        ->orWhere(['j.ticket_price' => $ticketprice])
        ->orWhere(['j.average_person' => $averageperson])
        ->all();
        }else{
            $data = (new \yii\db\Query())
        ->select('tjs.id as summaryid,cn.name as continentName,c.name as countryName,tjs.*,j.*,ur.*')
        ->from('ticket_jackpot_summary as tjs')
        ->join('LEFT OUTER JOIN', 'jackpot_details as j','tjs.jackpot_id = j.id')	
        ->join('LEFT OUTER JOIN', 'users_register as ur', 'tjs.user_id = ur.id')
        ->join('LEFT OUTER JOIN', 'countries as c', 'j.countryid = c.code')
        ->join('LEFT OUTER JOIN', 'continents as cn', 'j.continent = cn.code')
         ->all();   
            
        }
        $dataProvider = new ArrayDataProvider([
            'allModels' => $this->summaryData($data),
            'pagination' => [
            'pageSize' => Yii::getAlias('@paging'),
         ],
        ]);
        
        
       /* 
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);*/

        $this->load($params);

       /* if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }*/

       /* $query->andFilterWhere([
            'id' => $this->id,
            'jackpot_id' => $this->jackpot_id,
            'user_id' => $this->user_id,
            'updated_on' => $this->updated_on,
        ]);

        $query->andFilterWhere(['like', 'ticket_number', $this->ticket_number])
            ->andFilterWhere(['like', 'created_on', $this->created_on]);
*/
        return $dataProvider;
    }
    
    public function summaryData($data){
         $summaryArray = array(); 
            foreach($data as $key => $value){
                $summaryArray[$value["summaryid"]] = $value;
            }
            return $summaryArray;
    }
}
