🌹 Rose Bud Thorn (RBT) – WordPress Emotional Journaling App

Rose Bud Thorn (RBT) is a private emotional journaling system built on top of WordPress.
It lets you record, review, and analyze your daily emotional state using the Rose/Bud/Thorn reflection method combined with a structured stage-based framework.

This project powers a personal self-reflection workflow while being fully private, secure, and extendable.

🚀 Features
Core Functionality

Custom Post Type: rbt_entry

ACF-powered fields:

Rose (what went well)

Bud (what has potential)

Thorn (what was challenging)

Emotional Stage (Fragment → Freeze → Distance → Stability → Trust)

Suggested Action

Timestamp (Unix format for future analytics)

Front-End Screens

RBT Dashboard – list and review saved entries

New Entry Form – add RBT entries without accessing wp-admin

Single Entry View – clean detail view for each entry

Security & Privacy

Requires login for:

Dashboard

New Entry page

Single entry pages

Hidden from WordPress search

Protected from Google indexing (noindex, nofollow)

Locked REST API (RBT data accessible only to logged-in users)

/theme
  ├── functions.php
  ├── page-rbt-dashboard.php     # front-end dashboard
  ├── page-rbt-new-entry.php     # front-end entry form
  ├── single-rbt_entry.php       # single RBT entry view
  ├── acf-json/                  # (optional) ACF field group export


