SET @@foreign_key_checks = 0;

SELECT count(*) FROM applications WHERE id NOT IN(SELECT application_id FROM application_stages);

SELECT created_at, updated_at, deleted_at, id as application_id, stage_id, applicant_id, organization_id, position_id, UUID() FROM applications WHERE id NOT IN(SELECT application_id FROM application_stages);

REPLACE INTO application_stages (created_at, updated_at, deleted_at, application_id, stage_id, applicant_id, organization_id, position_id, id) SELECT created_at, updated_at, deleted_at, id as application_id, stage_id, applicant_id, organization_id, position_id, UUID() FROM applications WHERE id NOT IN(SELECT application_id FROM application_stages);

SELECT count(*) FROM application_stages WHERE application_id NOT IN(SELECT id FROM applications);

REPLACE INTO applications (id, created_at, updated_at, deleted_at, applicant_id, organization_id, position_id, stage_id) SELECT application_id as id, created_at, updated_at, deleted_at, applicant_id, organization_id, position_id, stage_id FROM application_stages WHERE application_id NOT IN(SELECT id FROM applications);

SELECT application_id FROM application_stages WHERE application_id NOT IN(SELECT id FROM applications);

select id from application_stages where applicant_id not in (select id from users);

delete from applications where applicant_id not in (select id from users);

delete from application_stages where applicant_id not in (select id from users);

SET @@foreign_key_checks = 1;
