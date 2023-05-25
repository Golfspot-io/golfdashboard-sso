# Golfdashboard SSO

This repository shows an example on how to implement Golfdashboard SSO on your website.
The necessary credentials can be retrieved through [Golfspot](https://app.golfspot.io).

## Flow
To clearify how the flow is working, you can find it visualized below.
```mermaid
flowchart TD
    subgraph Website["Website"]
        index.php
        success.php
        fail.php
    end
    subgraph ProfileApi["API"]
        SSO["POST Login credentials"]
        Succeed{{"Login successful"}}
        Profile["GET Profile information"]
    end

    index.php --> SSO
    SSO -.-> Succeed
    Succeed -->|Yes| success.php
    Succeed -->|No| fail.php
    success.php -.- Profile
```
