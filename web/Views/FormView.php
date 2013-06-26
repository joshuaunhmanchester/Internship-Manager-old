<?php


class FormView 
{
    // This is used to build the main form to create a student profile
    static function buildForm()
    {
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
}


?>