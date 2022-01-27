# VisitorLog
A website visitor logger. Logs IP address and date/time in CSV file called visitors.csv.

Use:
```
use VisitorLog\VisitorLog;

session_start()

// log every visitor
$visitor = new VisitorLog(false);

// or, log daily unique visitors
$visitor = new VisitorLog(true);

$visitor->log();
```
