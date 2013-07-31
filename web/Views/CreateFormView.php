<?php

    class CreateFormView 
    {
        // This is used to build the main form to create a student profile
        // think about making the form a class and use class based system to create the fields
        static function buildForm() {
        
            $form = '
                        <div class="create-form">
                            <form method="POST">
                                <fieldset>
                                    <legend>Student Information</legend>
                                    <div class="form-item">
                                        <div class="label">
                                            <label for="fname">First Name</label>
                                        </div>
                                        <div class="input">
                                            <input type="text" id="fname" name="fname" value="'.$_POST['fname'].'"/>
                                        </div>
                                    </div>
                                    <div class="form-item">
                                        <div class="label">
                                            <label for="lname">Last Name</label>
                                        </div>
                                        <div class="input">
                                            <input type="text" id="lname" name="lname" value="'.$_POST['lname'].'"/>
                                        </div>
                                    </div>
                                    <div class="form-item">
                                        <div class="label">
                                            <label for="email">UNH Email</label>
                                        </div>
                                        <div class="input">
                                            <input type="text" id="email" name="email" value="'.$_POST['email'].'"/>
                                        </div>
                                    </div>
                                    <input type="submit" id="submitButton" name="submitButton" value="Save" />
                                </fieldset>
                            </form>
                        </div>';
                        
            return $form;
        }
    
        static function getStudentForm() {
            $s = '
                        <form method="POST">
                            <div class="form-wrapper student">
                                <div class="label">Create New Position</div>
                                <div class="form-wrapper-item">
                                    <input type="hidden" id="selected-student-from-list" />
                                    <div class="label">1. Student Information</div>
                                    <div class="options">
                                        <span id="student-opts-search-student">Search</span>
                                        <span id="student-opts-view-list">View Current List</span>
                                        <span id="student-opts-create-custom">Create New Student</span>
                                    </div>
                                    <div class="input-search" id="student-search-wrapper">
                                        <input type="text" id="student-search" name="student-search" placeholder="UNH Email or Last Name"/>
                                        <span id="btn-student-search" class="search"><img src="/intern/inc/images/small_Search.png" /></span>
                                    </div>
                                    <div class="student-list" id="generatedStudentList">
                                    </div>
                                    <div class="custom-form-wrapper" id="studentForm">
                                        <div class="form-item">
                                            <div class="input-label">
                                                <label for="fname">First Name</label>
                                            </div>
                                            <div class="input">
                                                <input type="text" id="fname" name="fname" value="'.$_POST['fname'].'" />
                                            </div>
                                        </div>
                                        <div class="form-item">
                                            <div class="input-label">
                                                <label for="lname">Last Name</label>
                                            </div>
                                            <div class="input">
                                                <input type="text" id="lname" name="lname" value="'.$_POST['lname'].'"/>
                                            </div>
                                        </div>
                                        <div class="form-item">
                                            <div class="input-label">
                                                <label for="email">UNH Email</label>
                                            </div>
                                            <div class="input">
                                                <input type="text" id="email" name="email" value="'.$_POST['email'].'"/>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="button" id="student-continue" class="continue" value="Continue" />
                                </div>
                                <div class="current-status-wrapper">
                                    <h2>Form Completion Status</h2>
                                    <div class="step1">1. Student Information</div>
                                    <div class="step2">2. Company Information</div>
                                    <div class="step3">3. Supervisor Information</div>
                                    <div class="step4">4. Position Information</div>
                                </div>
                            </div>
                            <div class="form-wrapper" id="company-form-wrapper">
                        ';
            return $s;
        }

        static function getCompanyForm() {
            $s = '
                                <div class="form-wrapper-item">
                                    <input type="hidden" id="selected-company-from-list" />
                                    <div class="label">2. Company Information</div>
                                    <div class="options">
                                        <span id="company-opts-search-company">Search</span>
                                        <span id="company-opts-view-list">View Current List</span>
                                        <span id="company-opts-create-custom">Create New Company</span>
                                    </div>
                                    <div class="input-search" id="company-search-wrapper">
                                        <input type="text" id="company-search" name="company-search" placeholder="Company Name"/>
                                        <span id="btn-company-search" class="search"><img src="/intern/inc/images/small_Search.png" /></span>
                                    </div>
                                    <div class="company-list" id="generatedCompanyList">
                                    </div>
                                    <div class="custom-form-wrapper" id="companyForm">
                                        <div class="form-item">
                                            <div class="input-label">
                                                <label for="cName">Company Name</label>
                                            </div>
                                            <div class="input">
                                                <input type="text" id="cName" name="cName" value="'.$_POST['cName'].'" />
                                            </div>
                                        </div>
                                        <div class="form-item">
                                            <div class="input-label">
                                                <label for="cWebURL">Website</label>
                                            </div>
                                            <div class="input">
                                                <input type="text" id="cWebURL" name="webURL" value="'.$_POST['cWebURL'].'"/>
                                            </div>
                                        </div>
                                        <div class="form-item">
                                            <div class="input-label">
                                                <label for="cCity">City</label>
                                            </div>
                                            <div class="input">
                                                <input type="text" id="cCity" name="cCity" value="'.$_POST['cCity'].'"/>
                                            </div>
                                        </div>
                                        <div class="form-item">
                                            <div class="input-label">
                                                <label for="cState">State</label>
                                            </div>
                                            <div class="input">
                                                <input type="text" id="cState" name="cState" value="'.$_POST['cState'].'"/>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="button" id="company-continue" class="continue" value="Continue" />
                                </div>
                            </div> 
                            <div class="form-wrapper" id="supervisor-form-wrapper">                             
                        ';
            return $s;
        }

        static function getSupervisorForm() {
            $s = '
                                <div class="form-wrapper-item">
                                    <input type="hidden" id="selected-supervisor-from-list" />
                                    <div class="label">3. Supervisor Information</div>
                                    <div class="options">
                                        <span id="supervisor-opts-search-supervisor">Search</span>
                                        <span id="supervisor-opts-view-list">View Current List</span>
                                        <span id="supervisor-opts-create-custom">Create New Supervisor</span>
                                    </div>
                                    <div class="input-search" id="super-search-wrapper">
                                        <input type="text" id="supervisor-search" name="supervisor-search" placeholder="Supervisor Name"/>
                                        <span id="btn-supervisor-search" class="search"><img src="/intern/inc/images/small_Search.png" /></span>
                                    </div>
                                    <div class="supervisor-list" id="generatedSupervisorList">
                                    </div>
                                    <div class="custom-form-wrapper" id="supervisorForm">
                                        <div class="form-item">
                                            <div class="input-label">
                                                <label for="sFName">Supervisor First Name</label>
                                            </div>
                                            <div class="input">
                                                <input type="text" id="sFName" name="sFName" value="'.$_POST['sFName'].'" />
                                            </div>
                                        </div>
                                        <div class="form-item">
                                            <div class="input-label">
                                                <label for="sLName">Supervisor Last Name</label>
                                            </div>
                                            <div class="input">
                                                <input type="text" id="sLName" name="sLName" value="'.$_POST['sLName'].'" />
                                            </div>
                                        </div>
                                        <div class="form-item">
                                            <div class="input-label">
                                                <label for="sEmail">Email</label>
                                            </div>
                                            <div class="input">
                                                <input type="text" id="sEmail" name="sEmail" value="'.$_POST['sEmail'].'"/>
                                            </div>
                                        </div>
                                        <div class="form-item">
                                            <div class="input-label">
                                                <label for="sPhone">Phone</label>
                                            </div>
                                            <div class="input">
                                                <input type="text" id="sPhone" name="sPhone" value="'.$_POST['sPhone'].'"/>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="button" id="supervisor-continue" class="continue" value="Continue" />
                                </div>
                            </div>  
                            <div class="form-wrapper" id="position-form-wrapper">                              
                        ';
            return $s;
        }
        
        static function getPositionForm() {
            $s = '
                                <div class="form-wrapper-item">
                                    <div class="label">4. Position Information</div>
                                    <div class="custom-form-wrapper" id="positionForm">
                                        <div class="form-item">
                                            <div class="input-label">
                                                <label for="pTitle">Position Title</label>
                                            </div>
                                            <div class="input">
                                                <input type="text" id="pTitle" name="pTitle" value="'.$_POST['pTitle'].'" />
                                            </div>
                                        </div>
                                        <div class="form-item">
                                            <div class="input-label">
                                                <label for="pYear">Position Year</label>
                                            </div>
                                            <div class="input">
                                                <input type="text" id="pYear" name="pYear" value="'.$_POST['pYear'].'" />
                                            </div>
                                        </div>
                                        <div class="form-item">
                                            <div class="input">
                                                <input type="radio" id="pIsPaidYes" name="pIsPaid" value="'.$_POST['pIsPaidYes'].'"/>
                                                <label for="pIsPaidYes">Yes</label>
                                                <input type="radio" id="pIsPaidNo" name="pIsPaid" value="'.$_POST['pIsPaidNo'].'"/>
                                                <label for="pIsPaidNo">No</label>
                                            </div>
                                        </div>
                                        <div class="form-item">
                                            <div class="input-label">
                                                <label for="pEstHours">Estimated Hours Per Week</label>
                                            </div>
                                            <div class="input small">
                                                <input type="text" id="pEstHours" name="pEstHours" value="'.$_POST['pEstHours'].'"/>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="button" id="submitButton" name="submitButton" value="Submit" />
                                </div>
                            </div>                              
                        ';
            return $s;
        }

        static function getBottomFormTag() {
            $s = '
                        </form>';
            
            return $s;
        }    
    
        static function getAccordionForm() {
            $form = '
                        <form method="POST">
                            <div class="ac-container">
                                <div class="ac-item">
                                    <label class="ac-label">Student Information</label>
                                    <div class="ac-content">
                                        <div class="form-item">
                                            <div class="label">
                                                <label for="fname">First Name</label>
                                            </div>
                                            <div class="input">
                                                <input type="text" id="fname" name="fname" value="'.$_POST['fname'].'" />
                                            </div>
                                        </div>
                                        <div class="form-item">
                                            <div class="label">
                                                <label for="lname">Last Name</label>
                                            </div>
                                            <div class="input">
                                                <input type="text" id="lname" name="lname" value="'.$_POST['lname'].'"/>
                                            </div>
                                        </div>
                                        <div class="form-item">
                                            <div class="label">
                                                <label for="email">UNH Email</label>
                                            </div>
                                            <div class="input">
                                                <input type="text" id="email" name="email" value="'.$_POST['email'].'"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ac-item">
                                    <label class="ac-label">Company Information</label>
                                    <div class="ac-content">
                                        <div class="form-item">
                                            <label for="custom-company">Custom Company</label>
                                            <input type="radio" class="c-type" name="company-select" id="custom-company" value="custom" />
                                        </div>
                                        <div class="form-item">
                                            <label for="exist-company">Existing Company</label>
                                            <input type="radio" class="c-type" name="company-select" id="exist-company" value="existing" />
                                        </div>
                                        <!-- Add Drop Down with existing companies here -->
                                        <div id="custom-company-form">
                                            <div class="form-item">
                                                <div class="label">
                                                    <label for="cName">Company Name</label>
                                                </div>
                                                <div class="input">
                                                    <input type="text" id="cName" name="cName" value="'.$_POST['cName'].'" />
                                                </div>
                                            </div>
                                            <div class="form-item">
                                                <div class="label">
                                                    <label for="cWebsite">Website URL</label>
                                                </div>
                                                <div class="input">
                                                    <input type="text" id="cWebsite" name="cWebsite" value="'.$_POST['cWebsite'].'"/>
                                                </div>
                                            </div>
                                            <div class="form-item">
                                                <div class="label">
                                                    <label for="cCity">City</label>
                                                </div>
                                                <div class="input">
                                                    <input type="text" id="cCity" name="cCity" value="'.$_POST['cCity'].'"/>
                                                </div>
                                            </div>
                                            <div class="form-item">
                                                <div class="label">
                                                    <label for="cState">State</label>
                                                </div>
                                                <div class="input">
                                                    <input type="text" id="cState" name="cState" value="'.$_POST['cState'].'"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="submit" id="submitButton" name="submitButton" value="Save" />
                            </div>
                        </form>';
            
            return $form;
        }
}


?>