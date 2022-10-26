create database Food_Ordering_Database;

create table Sys_User( 
System_User_ID int not null,
System_Name varchar(20) not null,
System_User_Address varchar(40),
System_User_email varchar(30),
credit_card_no int ,
credit_card_exp_date varchar(12),


constraint PK_01 primary key (System_User_ID),
)

create table User_Message(
Message_ID int not null,
Cust_Message varchar(20),
Sender int not null,

constraint PK_02 primary key (Message_ID),
constraint FK_01 foreign key (Sender) references Sys_User (System_User_ID),

)


create table Restaurant(
Rest_ID int not null,
Rest_Name varchar(20),
Rest_Address varchar(40), 
constraint PK_03 primary key (Rest_ID),
)

create table Dish(
Dish_ID int not null,
Rest_ID int not null,
Dish_Name varchar(30),
Dish_Recipe varchar(50),
Price float , 
Time_To_Prepare varchar(20),

constraint PK_04 primary key (Dish_ID),
constraint FK_02 foreign key (Rest_ID) references Restaurant (Rest_ID),

)

create table Food_Order(
Order_ID int not null,
Customer_ID int not null,
Total_Price float,
Order_Date varchar(12),

constraint PK_05 primary key (Order_ID),
constraint FK_03 foreign key (Customer_ID) references Sys_User (System_User_ID), 
)

create table Order_Detail(
Order_Detail_ID int not null,
Order_id int not null,
Dish_id int not null,

constraint PK_06 primary key (Order_Detail_ID),
constraint FK_04 foreign key (Order_id) references Food_Order (Order_ID),
constraint FK_05 foreign key (Dish_id) references Dish (Dish_ID),
)


