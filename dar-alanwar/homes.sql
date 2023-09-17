create table homes
(
    id                                  bigint unsigned auto_increment
        primary key,
    banner_mini_words_title             text              null,
    banner_first_line_title             varchar(191)      null,
    banner_second_line_title            varchar(191)      null,
    banner_second_line_changeable_words text              null,
    banner_third_line_title             varchar(191)      null,
    banner_subtitle                     text              null,
    banner_first_button_name            varchar(191)      null,
    banner_first_button_link            text              null,
    banner_second_button_name           varchar(191)      null,
    banner_second_button_link           text              null,
    banner_image                        varchar(191)      null,
    special_feature_area                tinyint default 1 not null comment '1=active, 2=disable',
    courses_area                        tinyint default 1 not null comment '1=active, 2=disable',
    bundle_area                         tinyint default 1 not null comment '1=active, 2=disable',
    top_category_area                   tinyint default 1 not null comment '1=active, 2=disable',
    consultation_area                   tinyint default 1 not null comment '1=active, 2=disable',
    instructor_area                     tinyint default 1 not null comment '1=active, 2=disable',
    video_area                          tinyint default 1 not null comment '1=active, 2=disable',
    customer_says_area                  tinyint default 1 not null comment '1=active, 2=disable',
    achievement_area                    tinyint default 1 not null comment '1=active, 2=disable',
    faq_area                            tinyint default 1 not null comment '1=active, 2=disable',
    instructor_support_area             tinyint default 1 not null comment '1=active, 2=disable',
    created_at                          timestamp         null,
    updated_at                          timestamp         null
)
    engine = MyISAM
    collate = utf8mb4_unicode_ci;

