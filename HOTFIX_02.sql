SET @@foreign_key_checks = 0;

ALTER TABLE `tests` CHANGE `position_id` `position_id` CHAR(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL;

ALTER TABLE `tests` CHANGE `stage_id` `stage_id` CHAR(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL;

SET @@foreign_key_checks = 1;
