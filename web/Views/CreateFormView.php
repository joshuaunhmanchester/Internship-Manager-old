<?php

    class CreateFormView 
    {
        // This is used to build the main form to create a student profile
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
                                    <div class="label">1. Student Information</div>
                                    <div class="options">
                                        <span id="student-opts-search-student">Search</span>
                                        <span id="student-opts-view-list">View Current List</span>
                                        <span id="student-opts-create-custom">Create New Student</span>
                                    </div>
                                    <div class="input-search">
                                        <input type="text" id="student-search" name="student-search" placeholder="UNH Email or Last Name"/>
                                        <span id="btn-student-search" class="search"><img src="/intern//inc/images/small_Search.png" /></span>
                                    </div>
                                    <div class="student-list" id="generatedStudentList">
                                    </div>
                                    <div class="custom-form-wrapper" id="studentForm">
                                        <input type="hidden" id="selected-student-from-list" />
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
                                    <input id="student-continue" class="continue" value="Continue" />
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