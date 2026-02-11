
<style>
.spinner {
    display: inline-block;
    width: 14px;
    height: 14px;
    border: 2px solid #fff;
    border-top: 2px solid transparent;
    border-radius: 50%;
    animation: spin 0.6s linear infinite;
    margin-right: 6px;
    vertical-align: middle;
}

@keyframes spin {
    to { transform: rotate(360deg); }
}

#submitBtn {
    background: black;
    color: white;
    padding: 10px 20px;
    border: none;
    cursor: pointer;
}
</style>

<form id="contactForm" method="POST" validate>
    <div class='gform-body gform_body'>
        <ul class='gform_fields top_label form_sublabel_below description_below validation_below'>
            <li
                class="gfield gfield--type-name gfield_contains_required field_sublabel_below gfield--no-description field_description_below field_validation_below gfield_visibility_visible">
                <label class='gfield_label gform-field-label gfield_label_before_complex'>Name<span
                        class="gfield_required"><span
                            class="gfield_required gfield_required_asterisk">*</span></span></label>
                <div
                    class='ginput_complex ginput_container ginput_container--name no_prefix has_first_name no_middle_name has_last_name no_suffix gf_name_has_2 ginput_container_name gform-grid-row'>

                    <span container' class='name_first gform-grid-col gform-grid-col--size-auto'>
                        <input required="" type='text' name='firstname' value='' aria-required='true' />
                        <label for='' class='gform-field-label gform-field-label--type-sub '>First</label>
                    </span>

                    <span container' class='name_last gform-grid-col gform-grid-col--size-auto'>
                        <input required="" type='text' name='lastname' value='' aria-required='true' />
                        <label for='' class='gform-field-label gform-field-label--type-sub '>Last</label>
                    </span>

                </div>
            </li>
            <li
                class="gfield gfield--type-email gfield_contains_required field_sublabel_below gfield--no-description field_description_below field_validation_below gfield_visibility_visible">
                <label class='gfield_label gform-field-label' for='input_1_2'>Email<span class="gfield_required"><span
                            class="gfield_required gfield_required_asterisk">*</span></span></label>
                <div class='ginput_container ginput_container_email'>
                    <input required="" name='email' type='email' value='' class='medium' aria-required="true"
                        aria-invalid="false" />
                </div>
            </li>
            <li
                class="gfield gfield--type-textarea gfield_contains_required field_sublabel_below gfield--no-description field_description_below field_validation_below gfield_visibility_visible">
                <label class='gfield_label gform-field-label' for='input_1_3'>Your Message<span
                        class="gfield_required"><span
                            class="gfield_required gfield_required_asterisk">*</span></span></label>
                <div class='ginput_container ginput_container_textarea'><textarea name='textarea'
                        class='textarea medium' aria-required="true" aria-invalid="false" rows='10'
                        cols='50'></textarea></div>
            </li>
            <li
                class="gfield gfield--type-captcha field_sublabel_below gfield--no-description field_description_below field_validation_below gfield_visibility_visible">
                <label class='gfield_label gform-field-label' for='input_1_4'>Human Check</label>
                <div class='gfield_captcha_container'><img class='gfield_captcha'
                        src='135101340558b7.png?gf-download=1351013405.png&amp;form-id=captcha&amp;field-id=4&amp;hash=f91fb6020520d6ff4221e0d8266c676ddf43069730087d45bdf7ff9ebee56703'
                        alt='' width='150' height='42' />
                    <div class='gfield_captcha_input_container simple_captcha_medium'><input required type='text'
                            autocomplete='off' name='check' /><input required type='hidden' name='human_check'
                            value='1351013405' /></div>
                </div>
            </li>
        </ul>
    </div>

    <button type="submit" name="save" id="submitBtn">
    <span id="btnText">Submit</span>
    <span id="btnSpinner" style="display:none;">
        <span class="spinner"></span> Sending...
    </span>
</button>
    
    </div>
</form>


<script>
document.getElementById("contactForm").addEventListener("submit", function (e) {
    e.preventDefault();

    const form = this;
    const formData = new FormData(form);
    formData.append("save", "1");

    const submitBtn = document.getElementById("submitBtn");
    const btnText = document.getElementById("btnText");
    const btnSpinner = document.getElementById("btnSpinner");

    // 🔥 Show spinner
    submitBtn.disabled = true;
    btnText.style.display = "none";
    btnSpinner.style.display = "inline-block";

    fetch("submit.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.json())
    .then(data => {

        // 🔥 Restore button
        submitBtn.disabled = false;
        btnText.style.display = "inline";
        btnSpinner.style.display = "none";
       

        if (data.status === "success") {

            Swal.fire({
                icon: "success",
                title: "Success!",
                text: data.message,
                confirmButtonColor: "#000"
            });

            form.reset();

        } else {

            Swal.fire({
                icon: "error",
                title: "Error!",
                text: "data.message"
            });
        }

    })
    .catch(error => {
        alert(error);

        // 🔥 Restore button on error
        submitBtn.disabled = false;
        btnText.style.display = "inline";
        btnSpinner.style.display = "none";

        Swal.fire({
            icon: "error",
            title: "Server Error",
            text: "Something went wrong. Please try again."
        });
    });
});
</script>
