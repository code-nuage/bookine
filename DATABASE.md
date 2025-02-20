# 📊​ Database diagram
```
┌─────────────────────┐    ┌───────────────────────┐    ┌─────────────────────┐    ┌──────────────────┐
│ USERS               │    │ LOANS                 │    │ BOOKS               │    │ CATEGORYS        │
├─────────────────────┤    ├───────────────────────┤    ├─────────────────────┤    ├──────────────────┤
│id KEY        integer├►─┐ │id KEY          integer│ ┌─◄┤id KEY        integer│ ┌─o┤id KEY     integer│
│username      varchar│  └o┤user_id         integer│ │  │isbn          integer│ │  │name       varchar│
│first_name    varchar│    │book_id         integer├o┘  │title         varchar│ │  └──────────────────┘
│last_name     varchar│    │loaned_at     timestamp│    │author        varchar│ │                      
│role          varchar│    │return_at     timestamp│    │publish_date     date│ │                      
│password      varchar│    │returned_at   timestamp│    │category      integer├►┘                      
│created_at  timestamp│    │created_at    timestamp│    │created_at  timestamp│                        
└─────────────────────┘    └───────────────────────┘    └─────────────────────┘                        
```