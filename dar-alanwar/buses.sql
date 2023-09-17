create table buses
(
    id        bigint auto_increment
        primary key,
    code      int          null,
    driver_id int          null,
    name      varchar(250) null
);

