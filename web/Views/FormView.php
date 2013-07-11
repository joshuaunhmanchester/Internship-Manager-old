<?php


class FormView 
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