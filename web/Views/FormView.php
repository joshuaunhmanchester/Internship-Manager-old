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
                    </div>';
        
        return $form;
    }


    static function completeAccordionForm() {
        $form = '
                    <div class="ac-container">
                        <div class="ac-item">
                            <label class="ac-header-label" for="ac-1">Student Information</label>
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
                        <div>
                            <input id="ac-2" name="accordion-1" type="checkbox" />
                            <label class="ac-header-label" for="ac-2">How we work</label>
                            <article class="ac-medium">
                                <p></p>
                            </article>
                        </div>
                        <div>
                            <input id="ac-3" name="accordion-1" type="checkbox" />
                            <label class="ac-header-label" for="ac-3">References</label>
                            <article class="ac-large">
                                <p></p>
                            </article>
                        </div>
                        <div>
                            <input id="ac-4" name="accordion-1" type="checkbox" />
                            <label class="ac-header-label" for="ac-4">Contact us</label>
                            <article class="ac-large">
                                <p></p>
                            </article>
                        </div>
                    </div>
                    <input type="submit" id="submitButton" name="submitButton" value="Save" />';
                    
        return $form;
    }
}


?>