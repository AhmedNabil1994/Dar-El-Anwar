create table discussions
(
    id         bigint unsigned auto_increment
        primary key,
    course_id  bigint unsigned   not null,
    user_id    bigint unsigned   null,
    comment    longtext          not null,
    status     tinyint default 1 null comment '1=active, 2=deactivate',
    parent_id  bigint unsigned   null,
    comment_as tinyint           not null comment '1=Instructor, 2=Student',
    view       tinyint default 2 not null comment '1=seen,2=not seen',
    created_at timestamp         null,
    updated_at timestamp         null
)
    engine = MyISAM
    collate = utf8mb4_unicode_ci;

