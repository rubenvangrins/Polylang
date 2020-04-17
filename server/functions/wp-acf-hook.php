<?php

    // ACF Hook
    class ReformatContent {

        // List with variables
        private $disAllowed;
        private $allowedNames;

        // Constructor function
        function __construct () {

            // Set a field with disallowed fields
            $this->disAllowed = [
                "image",
                "file",
                "video",
                "url",
                "select",
                "post_object",
                "true_false",
                "taxonomy",
                "link",
                "number",
                "email",
                "group",
                "password"
            ];

            // Set an allowed list with field names
            $this->allowedNames = [
                "chapeau",
                "intro"
            ];
        }

        // Get disallowed field types on the other side of the function/hook
        public function getDisallowed () {
            return $this->disAllowed;
        }

        // Get allowed names that returns an array with field names
        // These field names will always correspond with the correct field
        public function getAllowed () {
            return $this->allowedNames;
        }

        // Get the string and replace the format with spans
        public function formatString ($string) {

            // Analyze the string
            $string = str_replace("((", "<span>", $string);
            $string = str_replace("))", "</span>", $string);

            // Check if there is a beginning and an end
            // If so, replace the

            // Return the string
            return $string;
        }
    }

    // Create function to run class from
    add_action("acf/format_value", function ($value, $id, $field) {

        // Declare class
        $r = new ReformatContent();

        // Only do this in the front-end
        if (is_admin() === false && in_array($field["type"], $r->getDisallowed()) === false && in_array($field["_name"], $r->getAllowed()) === true) {

            // Replace the __term__ with a <span>term</span> markup
            // Run the formatString function
            // Return the function if needed
            $value = $r->formatString($value);
        }

        // Return the value
        return $value;

    }, 10, 3);