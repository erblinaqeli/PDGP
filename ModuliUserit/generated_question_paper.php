<?php
// including the database lidhection file
include_once("konfigurimi.php");
   

    echo $id = $_REQUEST['id'];
 
    ?>
    <?php
/* Faqja (home.php) e cila paraqitet pasi perdoruesi te llogohet me sukses */
  include("kontrollo.php"); 
?>
    <?php
if($_SERVER['REQUEST_METHOD'] != 'POST'){
    echo "<scrtip> alert('You must fill generate form fields first'); location.replace(document.referer);</script>";
    exit;
}
extract($_POST);
if(isset($_POST['id']) && $_POST['id'] > 0){
    $qry = $lidh->query("SELECT q.*,CONCAT(cc.name,' - ',c.name) as `class` from `question_paper_list` q inner join class_list c on q.class_id = c.id inner join course_list cc on c.course_id = cc.id where q.id = '{$_POST['id']}' ");
    if($qry->num_rows > 0){
        foreach($qry->fetch_assoc() as $k => $v){
            $$k=$v;
        }
    }
}
$category = ["A.", "B.", "C."];
$current_category = 0;
?>
<div class="content py-3">
    <div class="card card-outline card-primary rounded-0 shadow">
        <div class="card-header">
            <h5 class="card-title"><b>Generated Question Paper</b></h5>
            <div class="card-tools">
                <button class="btn btn-default border btn-flat btn-sm" id="print"><i class="fa fa-print"></i> Print</button>
            </div>
        </div>
        <div class="card-body">
            <div id="outprint">
                <style>
                    .radio-choice{
                        height:15px;
                        width:15px;
                        border: 1px solid #000;
                        border-radius:50% 50%;
                    }
                    .check-choice{
                        height:15px;
                        width:15px;
                        border: 1px solid #000;
                    }
                    .text-field{
                        height:10em;
                        width:100%;
                    }
                </style>
                <h4 class="m-0 text-center"><b><?= isset($title) ? $title : "" ?></b></h4>
                
                <h5 class="m-0 text-center"><b><?= isset($class) ? $class : "" ?></b></h5>


                <hr>
                <small><i><b>General Instruction:</b> <?= isset($description) ? $description : '' ?></i></small>
                
                <?php $total= 0; ?>

                <hr>
                    <h5><b><?= $category[$current_category++]; ?></b> Write your Answer in the provided text field.</h5>
                    <hr>
                    <?php 
                    $total= 0;
                    $exists=array();

                   
            
                    while(true):
                        if($total==100):break; endif; 
                          $questions = $lidh->query("SELECT * from `question_list` where question_paper_id = '$id' and `level` = '{$level}' order by RAND() ");
                          $row= $questions->fetch_assoc();
                          $x=$row['idpytja'];
                          $T=in_array($x,$exists);?>
                           <?php if(!$T):?>
                         
                         
                             
                          
                            
                      
                              <?php if(($total+$row['points']<101)):
                                $total= $total + $row['points']; 
                                    $x=$row['idpytja'];
                                echo $x;
                                array_push($exists,$x);?>
                    

                         
                                              
                    <div class="question-item mb-3">
                        <div class="d-flex w-100 mb-1">
                            <div class="col-auto pr-1"><b>.</b></div>
                            <div class="col-auto flex-shrink-1 flex-grow-1"><?=$row['question'] ?><?=$total ?> <?=$row['points'] ?></div>

                        </div>
                        <div class="mx-2 mb-3">
                            <div class="text-field"></div>
                        </div>
                    </div>
                   

                                <?php endif; ?>
                     <?php endif; ?>
                       
                    <?php endwhile; ?>
                
            </div>
        </div>
    </div>
</div>
<script>
    $(function(){
        $('#print').click(function(){
            var h = $('head').clone()
            var p = $('#outprint').clone()
            var el = $('<div>')
            h.find('title').text("Generated Question Paper - Print View")
            h.append("<style> html,body{ min-height:unset !important}</style>");
            el.append(h)
            el.append(p)
            start_loader()
            var nw = window.open("","_blank","width=1000,height=800, left=200, top=50")
            nw.document.write(el.html())
            nw.document.close()
            setTimeout(() => {
                nw.print()
                setTimeout(() => {
                    nw.close()
                    end_loader()
                }, 200);
            }, 300);
        })
    })
</script>
