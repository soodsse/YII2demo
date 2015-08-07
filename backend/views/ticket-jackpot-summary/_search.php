<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TicketJackpotSummarySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="price-breakdown-search">

    <form method="post" action="?r=ticket-jackpot-summary" id="w0">
    <div class="form-group field-pricebreakdownsearch-id">
<label for="pricebreakdownsearch-id" class="control-label">Ticket Number</label>
<input type="text" value="" name="PriceBreakdownSearch[ticketnumber]" class="form-control" id="pricebreakdownsearch-ticketnumber">

<div class="help-block"></div>
</div>
    <div class="form-group field-pricebreakdownsearch-admin">
<label for="pricebreakdownsearch-admin" class="control-label">Jackpot Price</label>
<input type="text" value="" name="PriceBreakdownSearch[jackpotprice]" class="form-control" id="pricebreakdownsearch-jackpotprice">

<div class="help-block"></div>
</div>
    <div class="form-group field-pricebreakdownsearch-jackpot">
<label for="pricebreakdownsearch-jackpot" class="control-label">Ticket Price</label>
<input type="text" value="" name="PriceBreakdownSearch[ticketprice]" class="form-control" id="pricebreakdownsearch-ticketprice">

<div class="help-block"></div>
</div>
    <div class="form-group field-pricebreakdownsearch-charity">
<label for="pricebreakdownsearch-charity" class="control-label">Average person</label>
<input type="text" value="" name="PriceBreakdownSearch[averageperson]" class="form-control" id="pricebreakdownsearch-averageperson">

<div class="help-block"></div>
</div>
    <div class="form-group">
        <button class="btn btn-primary" type="submit">Search</button> 
           </div>

    </form>
</div>
