# PageFlex Order Automation
**Automating the transfer of ordered items to client specific print vendors**


## Project Organization
```
.
├── app/
│   ├── complete/               # processed orders stored here
│   ├── config/
│   │   ├── bootstrap.php
│   │   └── settings.example.php
│   ├── orders/                 # new orders land here
│   ├── zip/                    # zip packaged orders stored here
│   └── index.php               # application entry point
├── src/
│   └── OrderAutomation/
│       ├── Controller/
│       │   └── AppController.php/
│       └── Handlers/
│           ├── Process.php
│           ├── Read.php
│           ├── Send.php
│           └── Message.php
├── vendor/                     # project dependencies
├── .gitignore
├── composer.json
├── composer.lock
└── README.md
```