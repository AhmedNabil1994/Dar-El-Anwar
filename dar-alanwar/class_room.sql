create table class_room
(
    id                   bigint unsigned auto_increment
        primary key,
    uuid                 char(36)                              not null,
    course_id            bigint                                not null,
    lesson_id            bigint                                not null,
    title                varchar(191)                          not null,
    lecture_type         tinyint      default 2                not null comment '1=free/show, 2=paid/lock',
    file_path            varchar(191)                          null,
    url_path             varchar(191)                          null,
    file_size            varchar(191)                          null,
    file_duration        varchar(191)                          null,
    file_duration_second double                                null,
    type                 varchar(100) default 'uploaded_video' not null comment 'video, youtube, vimeo, text, image, pdf, slide_document, audio',
    vimeo_upload_type    tinyint      default 1                null comment '1=video file upload, 2=vimeo uploaded video id',
    text                 longtext                              null,
    image                varchar(191)                          null,
    pdf                  varchar(191)                          null,
    slide_document       varchar(191)                          null,
    audio                varchar(191)                          null,
    created_at           timestamp                             null,
    updated_at           timestamp                             null,
    name                 varchar(255)                          null,
    constraint course_lectures_uuid_unique
        unique (uuid)
)
    engine = MyISAM
    collate = utf8mb4_unicode_ci;

