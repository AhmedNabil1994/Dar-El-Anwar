create table courses
(
    id                    bigint unsigned auto_increment
        primary key,
    uuid                  char(36)                   null,
    user_id               bigint                     null,
    category_id           bigint                     null,
    subcategory_id        bigint                     null,
    course_language_id    bigint                     null,
    difficulty_level_id   bigint                     null,
    title                 varchar(191)               null,
    subtitle              text                       null,
    description           mediumtext                 null,
    feature_details       mediumtext                 null,
    price                 decimal(8, 2) default 0.00 not null,
    learner_accessibility varchar(50)                null comment 'paid,free',
    image                 varchar(191)               null,
    intro_video_check     tinyint                    null comment '1=normal video, 2=youtube_video',
    video                 varchar(191)               null,
    youtube_video_id      varchar(191)               null,
    slug                  varchar(191)               null,
    status                tinyint       default 0    not null comment '0=pending, 1=published, 2=waiting_for_review, 3=hold, 4=draft',
    average_rating        decimal(8, 2) default 0.00 null,
    created_at            timestamp                  null,
    updated_at            timestamp                  null,
    code                  varchar(250)               null,
    subject               varchar(250)               null,
    content               varchar(500)               null,
    time                  date                       null,
    date_from             date                       null,
    date_to               date                       null,
    students_count        int                        null,
    instructor_id         int                        not null,
    constraint courses_uuid_unique
        unique (uuid)
)
    engine = MyISAM
    collate = utf8mb4_unicode_ci;

