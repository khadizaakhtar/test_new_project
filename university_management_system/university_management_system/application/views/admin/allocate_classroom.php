<?php
$this->load->view('includes/admin_header');
?>
<style>
    #content{
        min-height:800px !important; 
    }
</style>
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
                    <a href="#">Home</a>
                    <i class="icon-angle-right"></i> 
                </li>
                <li>
                    <i class="icon-edit"></i>
                    <a href="#">Forms</a>
                </li>
                 <li class="pull-right">
                     <a class="btn btn-primary" title="delete this" href="<?php echo base_url();?>logout" title="Delete">
                      Log Out 
                     </a>
                </li>  
            </ul>

            <div class="row-fluid sortable">
                <div class="box span12">
                    <div class="box-header" data-original-title>
                        <h2><i class="halflings-icon edit"></i><span class="break"></span>Form Elements</h2>
                        <div class="box-icon">
                            <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                            <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                            <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                        </div>
                    </div>

                    <?php
                    if (validation_errors() || $this->session->flashdata('err')) {
                        ?>
                        <div class="alert alert-danger alert-dismissable">
                            <i class="fa fa-ban"></i>
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <b>Error!</b> <?php echo validation_errors(); ?>
                            <?php echo $this->session->flashdata('err'); ?>

                        </div>
                    <?php } ?>

                    <?php
                    if ($this->session->flashdata('success')) {
                        ?>
                        <div class="alert alert-success alert-dismissable">
                            <i class="fa fa-check"></i>
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <b>Success!</b> 
                            <?php echo $this->session->flashdata('success'); ?>
                        </div>
                    <?php } ?> 

                    <div class="box-content"> 
                        <form class="form-horizontal" action="<?php echo base_url(); ?>save_course" method="post">
                            <fieldset>
                                <div class="control-group">
                                    <label class="control-label" for="selectError3">Department</label>
                                    <div class="controls">
                                        <select name="department_id">
                                            <option value="">Select Department</option>
                                                  <?php
                                                 foreach ($all_department as $v_dept) {
                                                  ?>
                                            <option value="<?php echo $v_dept->dept_id; ?>"><?php echo $v_dept->dept_name; ?></option>  
                                                 <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="control-group">
                                    <label class="control-label" for="selectError3">Course</label>
                                    <div class="controls">
                                        <select name="course_id">
                                            <option value="">Select Course</option>
                                                  <?php
                                                 foreach ($all_course as $v_res) {
                                                  ?>
                                            <option value="<?php echo $v_res->course_id; ?>"><?php echo $v_res->course_name; ?></option>  
                                                 <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                
                                 <div class="control-group">
                                    <label class="control-label" for="selectError3">Room Number</label>
                                    <div class="controls">
                                        <select name="course_id">
                                            <option value="">Select Classroom</option>
                                                  <?php
                                                 foreach ($all_classroom as $v_res) {
                                                  ?>
                                            <option value="<?php echo $v_res->classroom_id; ?>"><?php echo $v_res->room_number; ?></option>  
                                                 <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="control-group">
                                    <label class="control-label" for="typeahead">Course Name </label>
                                    <div class="controls">
                                        <input type="text" name="course_name" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4" data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'>
                                    </div>
                                </div>
                                 <div class="control-group">
                                    <label class="control-label" for="typeahead">Course Code </label>
                                    <div class="controls">
                                        <input type="text" name="course_code" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4" data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'>
                                    </div>
                                </div>
                                 <div class="control-group">
                                    <label class="control-label" for="typeahead">Course Credit</label>
                                    <div class="controls">
                                        <input type="text" name="course_credit" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4" data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'>
                                    </div>
                                </div>
                                
                                  <div class="control-group">
                                    <label class="control-label" for="selectError3">Semister</label>
                                    <div class="controls">
                                        <select name="semister">
                                            <option value="">Select Semister</option>    
                                            <option value="spring">Spring</option>  
                                            <option value="fall">Fall</option>  
                                            <option value="summer">Summer</option>  
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group hidden-phone">
                                    <label class="control-label" for="textarea2">Course Description</label>
                                    <div class="controls">
                                        <textarea name="course_description"  rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <button type="submit" name="btn" class="btn btn-primary">Save Course</button>
                                    <button type="reset" class="btn">Reset</button>
                                </div>
                            </fieldset>
                        </form>   
                    </div>
                </div><!--/span-->
            </div><!--/row-->
			<div class="row-fluid sortable">
                <div class="box span12">
                    <div class="box-header" data-original-title>
                        <h2></h2>
                        <div class="box-icon">
                            <a href="#" class="btn-setting"></a>
                            <a href="#" class="btn-minimize"></a>
                            <a href="#" class="btn-close"></a>
                        </div>
                    </div>
                    <div class="box-content">
                        <form class="form-horizontal">
                            
                        </form>
                    </div>
                </div><!--/span-->

            </div>
			<div class="row-fluid sortable">
                <div class="box span12">
                    <div class="box-header" data-original-title>
                        <h2></h2>
                        <div class="box-icon">
                            <a href="#" class="btn-setting"></a>
                            <a href="#" class="btn-minimize"></a>
                            <a href="#" class="btn-close"></a>
                        </div>
                    </div>
                    <div class="box-content">
                        <form class="form-horizontal">
                            
                        </form>
                    </div>
                </div><!--/span-->

            </div>
        </div><!--/.fluid-container-->
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
<!-- start: JavaScript-->
<?php
$this->load->view('includes/admin_footer');
?>
