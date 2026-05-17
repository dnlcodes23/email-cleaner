<?php

namespace App\Services;

/**
 * Class EmailCleanerService
 * Handles all processing, formatting, and validation logic for email lists.
 */
class EmailCleanerService
{
    /**
     * Process and clean a raw string containing email addresses.
     *
     * @param string $rawText
     * @return array Contains cleaned string and statistics.
     */
    public function clean(string $rawText): array
    {
        // 1. Split text into an array line by line
        $emails = preg_split('/\r\n|\r|\n/', $rawText);
        $originalCount = count($emails);

        // 2. Trim whitespace and convert all emails to lowercase
        $cleanedEmails = array_map(function ($email) {
            return strtolower(trim($email));
        }, $emails);

        // 3. Filter out invalid email formats
        $validEmails = array_filter($cleanedEmails, function ($email) {
            return filter_var($email, FILTER_VALIDATE_EMAIL);
        });

        // 4. Remove duplicate email addresses
        $uniqueEmails = array_unique($validEmails);

        // 5. Return the structured results and statistics
        return [
            'text' => implode("\n", $uniqueEmails),
            'original_count' => $originalCount,
            'cleaned_count' => count($uniqueEmails),
        ];
    }
}
