# Gia — Real Estate Site ("Property Talks")

A WordPress site built on the premium **Kallyas** theme (via a `kallyas-child` child theme), originally bundled with plugins like Gravity Forms, Revolution Slider, Bookly, and bbPress.

## What changed in this cleanup

This repository used to have the **entire WordPress core, every third-party theme and plugin, and the full media library committed to git** (~9,700 files, ~70MB) — none of which is this project's own code. It also had `wp-config.php` committed with a live database password and WordPress secret keys, and a full database dump (`gia_real_estate.sql`) containing live Twitter API credentials and a theme license key, both **publicly exposed**.

Both files have been purged from the entire git history (not just deleted — removed from every past commit) and force-pushed. If this site is still live anywhere, **that database password and those Twitter/WordPress credentials must be treated as compromised and rotated**, regardless of the history rewrite.

Going forward, this repo tracks only the project's own code:

- `wp-content/themes/kallyas-child/` — the child theme (currently still the unmodified Kallyas boilerplate; `functions.php` has commented-out examples waiting to be filled in with real customizations).
- `.htaccess` — site rewrite rules.
- `wp-config-sample.php` — a config template with no real credentials.

WordPress core, the parent `rdbweb`/Kallyas theme, third-party plugins, bundled default themes, and the uploads folder are no longer version-controlled (see `.gitignore`) — they're vendor/binary content that belongs in a proper WordPress install and a media backup, not in this repo.

## Setting up a local copy

1. Install WordPress core (download from wordpress.org, or `wp core download` via WP-CLI) into this directory — the `.gitignore` already excludes it.
2. Copy `wp-config-sample.php` to `wp-config.php` and fill in real database credentials (never commit this file).
3. Reinstall the Kallyas parent theme and the plugins this site used to run (Gravity Forms, Revolution Slider, Bookly, bbPress, Akismet, etc.) — licensed/vendor code, obtained from their respective sources, not from this repo's history.
4. This repo's own `wp-content/themes/kallyas-child/` is already here.
5. Restore the database from a backup kept outside of git (the old in-repo dump has been removed, both for size and because it contained credentials).

## Continuous integration

Every push lints the tracked PHP files with `php -l` (`.github/workflows/ci.yml`) — there isn't custom business logic here yet to unit test, since the child theme is still unmodified boilerplate.

## License

This is a client/business site, not an open-source project — no license file is included. The Kallyas theme itself is commercial (ThemeForest) and must be licensed separately from its author.
