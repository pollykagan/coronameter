<?php $begin('before_button') ?>
<div id='div' class="col-md-9 order-md-1">
    <form method="post">
    <h5 class="text-center lead"><b>Create a new survey</b></h5>
    <div class="card">
    <div class="card-body">
        <div class="mb-3"> <label for="question">Question<span class="text-muted"></span></label>
            <input type="text" class="form-control" name="question" id="question" placeholder="Which Software for our meeting tomorrow?"> </div>
        <div class="mb-3"> <label for="answer1">Answer 1<span class="text-muted"></span></label>
            <input type="text" class="form-control" name="answer1" id="answer1" placeholder="Zoom"> </div>
        <div  class="mb-3"> <label for="answer2">Answer 2<span class="text-muted"></span></label>
            <input type="text" class="form-control"  name="answer2" id="answer2" placeholder="Skype"> </div>
<?php $end('before_button') ?>

<?php $begin('after_button') ?>

        <div class="d-block my-3">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="multiple" name="multiple" value="multiple"> <label class="custom-control-label" for="multiple">Multiple choice possible</label> </div>
        </div>
        <div class="d-block my-3">
            <div class="mb-3"><label for="formDisplay">Form to display:</label>
                <div class="custom-control custom-radio">
                    <input id="balken" name="formDisplay" type="radio" class="custom-control-input" checked  value="bars"> <label class="custom-control-label" for="balken">Balken</label> </div>
                <div class="custom-control custom-radio">
                    <input id="donut" name="formDisplay" type="radio" class="custom-control-input"  value="donut"> <label class="custom-control-label" for="donut">Donut</label> </div>
            </div>
        </div>
        <button class="btn btn-primary btn-lg btn-block" name="save" type="submit">Save</button>
    </form>
    </div>
    </div>
</div>
<?php $end('after_button') ?>

<?php $begin('button') ?>
<button type="button" id="onemore" onclick="ob()" class="btn btn-primary btn-lg btn-block">One more answer</button>
    <script>
        var div = document.getElementById('div');
        var btn = document.getElementById('onemore');
        var element = document.getElementById('answer2');
        var count = 3;

        function ob() {
             var id = 'answer' + count.toString();
             var newdiv = document.createElement('div');
             newdiv.setAttribute('class', 'mb-3');
             var label = document.createElement('label');
             var span = document.createElement('span');
             span.setAttribute('class', 'text-muted');
             label.appendChild(span);
             var input = document.createElement('input');
             input.setAttribute('type', 'text');
             input.setAttribute('class', 'form-control');
             label.setAttribute('for', id);
             label.textContent = 'Answer ' + count.toString();
             input.setAttribute('id', id);
             input.setAttribute('name', id);
             newdiv.appendChild(label);
             newdiv.appendChild(input);
             if (count<51){
             btn.insertAdjacentElement('beforebegin', newdiv);
             count++;
            }
        }
    </script>
<?php $end('button') ?>