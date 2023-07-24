import { defineRule } from "vee-validate";
defineRule("required", (value) => {
    // if the field is empty
    if (value === "") {
        return "This field is required";
    }
    // All is good
    return true;
});
defineRule("number", (value) => {
    // if the field is less than 1
    if (value <= 0) {
        return "This field must be greater than 0";
    }
    // All is good
    return true;
});
