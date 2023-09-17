create table live_classes
(
    id                bigint unsigned auto_increment
        primary key,
    uuid              char(36)        not null,
    user_id           bigint unsigned not null,
    course_id         bigint unsigned null,
    class_topic       text            not null,
    date              date            not null,
    time              time            not null,
    duration          varchar(191)    not null comment 'duration must be minutes',
    start_url         mediumtext      null,
    join_url          mediumtext      null,
    meeting_id        varchar(191)    null,
    meeting_password  varchar(191)    null,
    meeting_host_name varchar(191)    null comment 'zoom,bbb,jitsi',
    moderator_pw      varchar(191)    null comment 'use only for bbb',
    attendee_pw       varchar(191)    null comment 'use only for bbb',
    created_at        timestamp       null,
    updated_at        timestamp       null,
    constraint live_classes_uuid_unique
        unique (uuid)
)
    engine = MyISAM
    collate = utf8mb4_unicode_ci;

