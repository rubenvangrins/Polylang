<?php

    // Get attachment
    function get_attachment_url_by_title ($title) {
        global $wpdb;
        $attachments = $wpdb->get_results( "SELECT * FROM $wpdb->posts WHERE post_title = '$title' AND post_type = 'attachment' ", OBJECT );
        if ($attachments) {
            $attachment_url = $attachments[0];
        } else {
            return false;
        }
        return $attachment_url;
    }