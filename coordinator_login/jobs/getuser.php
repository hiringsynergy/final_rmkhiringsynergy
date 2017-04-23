<?php ob_start();

session_start();

$_SESSION['roll']=null;

if(! isset($_SESSION['user']) && $_SESSION['user']==null && isset($_SESSION['user_role'])!='coordinator'){

    header("Location: ../../login");


}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <html lang="en" xmlns="http://www.w3.org/1999/html">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta charset="utf-8" />
        <title>Student Interaction - Ace Admin</title>

        <meta name="description" content="overview &amp; stats" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

        <!-- bootstrap & fontawesome -->
        <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
        <link rel="stylesheet" href="../assets/font-awesome/4.5.0/css/font-awesome.min.css" />


        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


        <!-- page specific plugin styles -->

        <!-- text fonts -->
        <link rel="stylesheet" href="../assets/css/fonts.googleapis.com.css" />

        <!-- ace styles -->
        <link rel="stylesheet" href="../assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

        <!--[if lte IE 9]>
        <link rel="stylesheet" href="../assets/css/ace-part2.min.css" class="ace-main-stylesheet"/>
        <![endif]-->
        <link rel="stylesheet" href="../assets/css/ace-skins.min.css" />
        <link rel="stylesheet" href="../assets/css/ace-rtl.min.css" />

        <!--[if lte IE 9]>
        <link rel="stylesheet" href="../assets/css/ace-ie.min.css"/>
        <![endif]-->

        <!-- inline styles related to this page -->

        <!-- ace settings handler -->
        <script src="../assets/js/ace-extra.min.js"></script>

        <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

        <!--[if lte IE 8]>
        <script src="../assets/js/html5shiv.min.js"></script>
        <script src="../assets/js/respond.min.js"></script>
        <![endif]-->
<!--
        <style type="text/css">


            .btn-file{

                position: relative;
                overflow: hidden;


            }
            .btn-file input[type=image]{

                position: absolute;
                top:0;
                right:0;
                min-width:100%;
                min-height:100%;
                font-size: 100px;
                text-align:right;
                -ms-filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=0);
                filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=0);
                opacity:0;
                outline: none;
                background: white;
                cursor: inherit;
                display: block;



            }

        </style>
-->

    </head>
<body>

<?php
//
//if(isset($_GET['update_submit'])) {
//
//
//    $ttt = $_GET['submit_title'];
//    $iii = $_GET['idfromget'];
//
//    $connect = mysqli_connect("mysql.hostinger.com","u552198179_root","rmkhiringsynergy", "u552198179_rmd");
//    $query = "UPDATE jobs SET job_title='{$ttt}' where job_id={$iii}";
//
//    $result = mysqli_query($connect, $query);
//
//    if (!$connect) {
//
//        die(" " . mysqli_error($connect));
//
//
//    }
//
//}


include "../connect.php";
$id=$_GET['id'];

$query="SELECT * FROM jobs where job_id={$id}";
$query1="SELECT * FROM company_list";

$result=mysqli_query($connect, $query);
$result1=mysqli_query($connect, $query1);

if(!$connect){

    die(" ".mysqli_error($connect));
}


while( $row= mysqli_fetch_assoc($result)) {


    ?>




        <div id="modal-form12" class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="blue bigger">Please fill the following form fields</h4>
                </div>
                <form action="jobs_panel" method="post">

                <div class="modal-body">
                    <div class="row">

                        <div class="col-xs-12 col-sm-5">
                            <div class="space"></div>

<!--
                            <label class="btn btn-default btn-file">
                                Browse<input type="file" style="display: none;">

                            </label>
-->

                            <div class="form-group">
                                <div class="col-xs-12 ">
                                    <input multiple=""  type="file" id="id-input-file-3" />
                                </div>
                            </div>

                            <label>
                                <input type="checkbox" name="file-format" id="id-file-format" class="ace" />
                                <span class="lbl"> Allow only images</span>
                            </label>
                        </div>

                        <div class="col-xs-12 col-sm-7">
                            <div class="form-group">
                                <label for="form-field-select-3">Company</label>

                                <div>
                                    <select name="submit_company" class="chosen-select" data-placeholder="Choose a Country...">
                                        <option value=""><?php echo $row['company'] ?></option>
                                        <?php

                                        while ($row2 = mysqli_fetch_assoc($result1)) {

                                            if ($row2['company_name'] != $row['company']) {
                                                ?>


                                                <option value="<?php echo $row2['company_id'] ?>"><?php echo $row2['company_name'] ?></option>


                                                <?php
                                            }
                                        }


                                        ?>


                                    </select>
                                </div>
                            </div>

                            <div class="space-4"></div>

                            <div class="form-group">
                                <label for="job-title">Job Title</label>

                                <div>
                                    <input type="text" id="job-title" name="submit_title"
                                           value="<?php echo $row['job_title'] ?>"/>
                                </div>
                            </div>
                            <div class="space-4"></div>
                            <div>
                                <input type="hidden" id="job-id" name="submit_id" value="<?php echo $row['job_id'] ?>"/>
                            </div>

                            <div class="form-group">
                                <label for="campus-date">CampusDate</label>

                                <div>
                                    <input type="text" name="submit_campus_date" id="campus-date" value="<?php echo $row['campus_date'] ?>"/>
                                </div>
                            </div>
                            <div class="space-4"></div>

                            <div class="form-group">
                                <label for="salary">Salary</label>

                                <div>
                                    <input type="text" name="submit_salary" id="salary" value="<?php echo $row['salary'] ?>"/>
                                </div>
                            </div>

                            <div class="space-4"></div>
                            <div class="form-group">
                                <label for="venue">Venue</label>

                                <div>
                                    <input type="text" name="submit_venue" id="venue" value="<?php echo $row['venue'] ?>"/>
                                </div>
                            </div>

                            <div class="space-4"></div>
                            <div class="form-group">
                                <label for="apply-before">Apply Before</label>

                                <div>
                                    <input type="text" name="submit_apply_before" id="apply-before" placeholder="Username"
                                           value="<?php echo $row['apply_before'] ?>"/>
                                </div>
                            </div>

                            <div class="space-4"></div>


                        </div>
                    </div>
                </div>

                <div class="modal-footer">


                    <button class="btn btn-sm btn-danger" type="submit">
                        <i class="ace-icon fa fa-times"></i>
                        Cancel
                    </button>
                    <input type="submit"  class="btn btn-sm btn-primary" name="update_submit">


                </div>

             </form>
            </div>
        </div>

    <?php

}

?>

<!-- basic scripts -->






<!--[if !IE]> -->
<script src="../assets/js/jquery-2.1.4.min.js"></script>

<!-- <![endif]-->

<!--[if IE]>
<script src="../assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
<script type="text/javascript">
    if('ontouchstart' in document.documentElement) document.write("<script src='../assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
</script>
<script src="../assets/js/bootstrap.min.js"></script>

<!-- page specific plugin scripts -->
<script src="../assets/js/jquery.dataTables.min.js"></script>
<script src="../assets/js/jquery.dataTables.bootstrap.min.js"></script>
<script src="../assets/js/dataTables.buttons.min.js"></script>
<script src="../assets/js/buttons.flash.min.js"></script>
<script src="../assets/js/buttons.html5.min.js"></script>
<script src="../assets/js/buttons.print.min.js"></script>
<script src="../assets/js/buttons.colVis.min.js"></script>
<script src="../assets/js/dataTables.select.min.js"></script>



<script src="../../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="../../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="../../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="../../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="../../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="../../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="vendors/datatables.net-scroller/js/datatables.scroller.min.js"></script>
<script src="../../vendors/jszip/dist/jszip.min.js"></script>
<script src="../../vendors/pdfmake/build/pdfmake.min.js"></script>
<script src="../../vendors/pdfmake/build/vfs_fonts.js"></script>

















<!-- ace scripts -->
<script src="../assets/js/ace-elements.min.js"></script>
<script src="../assets/js/ace.min.js"></script>

<!-- inline scripts related to this page -->
<script type="text/javascript">


    ;






    jQuery(function($) {
        //initiate dataTables plugin


        $('#id-input-file-3').ace_file_input({
            style: 'well',
            btn_choose: 'Drop files here or click to choose',
            btn_change: null,
            no_icon: 'ace-icon fa fa-cloud-upload',
            droppable: true,
            thumbnail: 'small'//large | fit
            //,icon_remove:null//set null, to hide remove/reset button
            /**,before_change:function(files, dropped) {
						//Check an example below
						//or examples/file-upload.html
						return true;
					}*/
            /**,before_remove : function() {
						return true;
					}*/
            ,
            preview_error : function(filename, error_code) {
                //name of the file that failed
                //error_code values
                //1 = 'FILE_LOAD_FAILED',
                //2 = 'IMAGE_LOAD_FAILED',
                //3 = 'THUMBNAIL_FAILED'
                //alert(error_code);
            }

        }).on('change', function(){
            //console.log($(this).data('ace_input_files'));
            //console.log($(this).data('ace_input_method'));
        });


        //$('#id-input-file-3')
        //.ace_file_input('show_file_list', [
        //{type: 'image', name: 'name of image', path: 'http://path/to/image/for/preview'},
        //{type: 'file', name: 'hello.txt'}
        //]);




        //dynamically change allowed formats by changing allowExt && allowMime function
        $('#id-file-format').removeAttr('checked').on('change', function() {
            var whitelist_ext, whitelist_mime;
            var btn_choose
            var no_icon
            if(this.checked) {
                btn_choose = "Drop images here or click to choose";
                no_icon = "ace-icon fa fa-picture-o";

                whitelist_ext = ["jpeg", "jpg", "png", "gif" , "bmp"];
                whitelist_mime = ["image/jpg", "image/jpeg", "image/png", "image/gif", "image/bmp"];
            }
            else {
                btn_choose = "Drop files here or click to choose";
                no_icon = "ace-icon fa fa-cloud-upload";

                whitelist_ext = null;//all extensions are acceptable
                whitelist_mime = null;//all mimes are acceptable
            }
            var file_input = $('#id-input-file-3');
            file_input
                .ace_file_input('update_settings',
                    {
                        'btn_choose': btn_choose,
                        'no_icon': no_icon,
                        'allowExt': whitelist_ext,
                        'allowMime': whitelist_mime
                    })
            file_input.ace_file_input('reset_input');

            file_input
                .off('file.error.ace')
                .on('file.error.ace', function(e, info) {
                    //console.log(info.file_count);//number of selected files
                    //console.log(info.invalid_count);//number of invalid files
                    //console.log(info.error_list);//a list of errors in the following format

                    //info.error_count['ext']
                    //info.error_count['mime']
                    //info.error_count['size']

                    //info.error_list['ext']  = [list of file names with invalid extension]
                    //info.error_list['mime'] = [list of file names with invalid mimetype]
                    //info.error_list['size'] = [list of file names with invalid size]


                    /**
                     if( !info.dropped ) {
							//perhapse reset file field if files have been selected, and there are invalid files among them
							//when files are dropped, only valid files will be added to our file array
							e.preventDefault();//it will rest input
						}
                     */


                    //if files have been selected (not dropped), you can choose to reset input
                    //because browser keeps all selected files anyway and this cannot be changed
                    //we can only reset file field to become empty again
                    //on any case you still should check files with your server side script
                    //because any arbitrary file can be uploaded by user and it's not safe to rely on browser-side measures
                });


            /**
             file_input
             .off('file.preview.ace')
             .on('file.preview.ace', function(e, info) {
						console.log(info.file.width);
						console.log(info.file.height);
						e.preventDefault();//to prevent preview
					});
             */

        });

    });
</script>

</body>
</html>