/*==============================================================*/
/* Table : AMI_EMPLOI                                           */
/*==============================================================*/
create table AMI_EMPLOI
(
   UTI_IDENTIFIANT      int not null  comment '',
   IDENTIFIANT          int  comment '',
   IDENTREPRISE         int  comment '',
   AGE                  int  comment '',
   MDP                  varchar(1024)  comment '',
   SEXE                 blob  comment '',
   STATUT               varchar(1024)  comment '',
   SOCIETE              varchar(1024)  comment '',
   primary key (UTI_IDENTIFIANT)
);

/*==============================================================*/
/* Table : ENTREPRISE                                           */
/*==============================================================*/
create table ENTREPRISE
(
   IDENTREPRISE         int not null  comment '',
   NOM                  varchar(1024)  comment '',
   SECTEUR              varchar(1024)  comment '',
   ADRESSE              varchar(1024)  comment '',
   primary key (IDENTREPRISE)
);

/*==============================================================*/
/* Table : OFFRE_EMPLOI                                         */
/*==============================================================*/
create table OFFRE_EMPLOI
(
   IDEMPLOI             int not null  comment '',
   IDENTREPRISE         int not null  comment '',
   IDENTIFIANT          int not null  comment '',
   DATELIMITE           datetime  comment '',
   INFOS                varchar(1024)  comment '',
   primary key (IDEMPLOI)
);

/*==============================================================*/
/* Table : PHOTOS                                               */
/*==============================================================*/
create table PHOTOS
(
   IDPHOTO              int not null  comment '',
   IDENTIFIANT          int not null  comment '',
   DATE                 datetime  comment '',
   TITRE                varchar(1024)  comment '',
   primary key (IDPHOTO)
);

/*==============================================================*/
/* Table : STATUT                                               */
/*==============================================================*/
create table STATUT
(
   IDSTATUT             int not null  comment '',
   IDENTIFIANT          int not null  comment '',
   DATE                 datetime  comment '',
   primary key (IDSTATUT)
);

/*==============================================================*/
/* Table : UTILISATEUR                                          */
/*==============================================================*/
create table UTILISATEUR
(
   Pseudo          		varchar(1024)  comment '',
   IDUTILISATEUR        int  not null  comment '',
   AGE                  int  not null  comment '',
   MDP                  varchar(1024)  comment '',
   SEXE                 enum('Homme','Femme')  comment '',
   primary key (IDUTILISATEUR)
);

INSERT INTO UTILISATEUR VALUES
("Othmane",100,21,"MDP",'Homme'),
("Stephane",101,21,"MDP",'Homme');


/*==============================================================*/
/* Table : VIDEOS                                               */
/*==============================================================*/
create table VIDEOS
(
   IDVIDEO              int not null  comment '',
   IDENTIFIANT          int not null  comment '',
   DATE                 datetime  comment '',
   TITRE                varchar(1024)  comment '',
   primary key (IDVIDEO)
);