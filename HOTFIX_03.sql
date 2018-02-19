SET @@foreign_key_checks = 0;

ALTER TABLE `question_attempts` CHANGE `answer` `answer` TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL;

ALTER TABLE `questions` CHANGE `firstChoice` `firstChoice` TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL;

ALTER TABLE `questions` CHANGE `secondChoice` `secondChoice` TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL;

ALTER TABLE `questions` CHANGE `thirdChoice` `thirdChoice` TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL;

ALTER TABLE `questions` CHANGE `fourthChoice` `fourthChoice` TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL;

ALTER TABLE `questions` CHANGE `fifthChoice` `fifthChoice` TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL;

ALTER TABLE `questions` CHANGE `correct` `correct` TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL;

SET @@foreign_key_checks = 1;
