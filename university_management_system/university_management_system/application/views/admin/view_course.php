<?php
$this->load->view('includes/admin_header');
?>
<style>
    #content{
        min-height:800px !important; 
    }
</style>
<!-- start: Header -->
<div class="navbar">
    <?php
    $this->load->view('includes/admin_header_menu');
    ?> 
</div>
<!-- start: Header -->

<div class="container-fluid-full">
    <div class="row-fluid">

        <!-- start: Main Menu -->
        <?php
        $this->load->view('includes/admin_main_menu');
        ?>
        <!-- end: Main Menu -->

        <noscript>
        <div class="alert alert-block span10">
            <h4 class="alert-heading">Warning!</h4>
            <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
        </div>
        </noscript>

        <!-- start: Content -->
        <div id="content" class="span10">


            <ul class="breadcrumb">
                <li>
                    <i class="icon-home"></i>
                    <a href="index.html">Home</a> 
                    <i class="icon-angle-right"></i>
                </li>
                <li><a href="#">Tables</a></li>
                <li class="pull-right">
                     <a class="btn btn-primary delete" title="delete this" href="<?php echo base_url();?>logout" title="Delete" >
                      Log Out 
                     </a>
                </li>  
            </ul>

            <div class="row-fluid sortable">		
                <div class="box span12">
                    <div class="box-header" data-original-title>
                        <h2><i class="halflings-icon user"></i><span class="break"></span>Members</h2>
                        <div class="box-icon">
                            <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                            <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                            <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                        </div>
                    </div>
                    <div class="box-content">
                        <table class="table table-striped table-bordered bootstrap-datatable datatable">
                            <thead>
                                <tr>
                                    <th>Course Id</th>
                                    <th>Course Code</th>
                                    <th>Course Name</th>
                                    <th>Department Name</th>
                                    <th>Course Credit</th>
                                    <th>Semister</th>
                                    <th>Course Description</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>   
                            <tbody>
                                <?php
                                foreach ($all_course as $v_result) {
                                    ?>
                                    <tr>
                                        <td><?php echo $v_result->course_id; ?></td>
                                        <td class="center"><?php echo $v_result->course_code; ?></td>
                                        <td class="center"><?php echo $v_result->course_name; ?> </td>
                                        <td class="center"><?php echo $v_result->dept_name; ?> </td>
                                         <td class="center"><?php echo $v_result->course_credit; ?> </td>
                                         <td class="center"><?php echo $v_result->semister; ?> </td>
                                         <td class="center"><?php echo $v_result->course_description; ?> </td>
                                        <td class="center">
                                            <a class="btn btn-info" href="<?php echo base_url(); ?>edit_course/<?php echo $v_result->course_id; ?>" title="Edit">
                                                <i class="halflings-icon white edit"></i>Edit  
                                            </a>
                                            <a class="btn btn-danger delete" title="delete this" href="<?php echo base_url(); ?>delete_course/<?php echo $v_result->course_id; ?>" title="Delete" onclick="return check_delete_info();">
                                                <i class="halflings-icon white trash"></i>Delete 
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>            
                    </div>
                </div><!--/span-->
            </div><!--/row-->
        </div><!--/.fluid-container-->
        <!-- end: Content -->
    </div><!--/#content.span10-->
</div><!--/fluid-row-->

<div class="modal hide fade" id="myModal">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h3>Settings</h3>
    </div>
    <div class="modal-body">
        <p>Here settings can be configured...</p>
    </div>
    <div class="modal-footer">
        <a href="#" class="btn" data-dismiss="modal">Close</a>
        <a href="#" class="btn btn-primary">Save changes</a>
    </div>
</div>

<div class="clearfix"></div>

<footer>

    <p>
        <span style="text-align:left;float:left">&copy; 2013 <a href="http://jiji262.github.io/Bootstrap_Metro_Dashboard/" alt="Bootstrap_Metro_Dashboard">Bootstrap Metro Dashboard</a></span>

    </p>

</footer>
<script>
    $('body').delegate('.delete', 'click', function () {

        var $thisLayoutBtn = jQuery(this);
        var $href = jQuery(this).attr('href');
        var makeChange = true;


        if (makeChange) {
            swal({
                title: "Are you sure?",
                text: "This album will be deleted",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes",
                cancelButtonText: "No",
                closeOnConfirm: false,
                closeOnCancel: true
            },
            function (isConfirm) {
//				  if (isConfirm) {
//					   window.location.href = $href;
//                                          
//				  } else {
//					  
//				  }

                if (isConfirm) {

                    //swal("Deleted!", "Your imaginary file has been deleted.", "success");
                    window.location.href = $href;
                } else {
                    // swal("Cancelled", "Your imaginary file is safe :)", "error");
                }
            });
        }

        return false;
    });
</script>
<?php
$this->load->view('includes/admin_footer');
?>
