# VisitorLog
A website visitor logger.

Use:
```
use VisitorLog\VisitorLog;

// log every visitor
$visitor = new VisitorLog(false);
// or, log daily unique visitors
$visitor = new VisitorLog(true);

$visitor->log();
```
