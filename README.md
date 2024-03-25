# VeliBar

VeliBar is a [SwiftBar](https://github.com/swiftbar/) plugin that displays the number of available bikes and docks at your chosen [Vélib](https://www.velib-metropole.fr/) stations in the menu bar.

![Screenshot](https://raw.githubusercontent.com/lehenandmartin/velibar/main/screenshot.jpg)

## Features

- Display of available mechanical and electric bikes.
- Display of available docks for returning bikes.
- Automatic information refresh each time the menu is opened.

## Prerequisites

- macOS with [SwiftBar](https://github.com/swiftbar/) installed.
- PHP installed on your machine (VeliBar has been tested with PHP 8.3).

## Installation

1. **Download the plugin**: Download `VeliBar.php` from the [releases page](https://github.com/lehenandmartin/velibar/releases) or clone the repository directly.

2. **Install SwiftBar**: If you haven't already, download and install SwiftBar from [its GitHub page](https://github.com/swiftbar/SwiftBar).

3. **Place the plugin in the SwiftBar plugin folder**:
   - Open SwiftBar and go to Preferences.
   - Locate the plugin folder and place the `VeliBar.php` file there.

## Configuration

### PHP Path

If the path to PHP on your system is different from `/opt/homebrew/bin/php`, you'll need to adjust the first line of the script. Here's how:

1. **Find the PHP path**: Open Terminal and type `which php`. This will give you the exact path of PHP on your system.

2. **Edit the script**: Open `VeliBar.php` in your favorite text editor and replace the first line with `#!/path/found/php`, using the path found in the previous step.

### Changing Stations to Monitor

By default, the plugin monitors certain stations. To change which stations are monitored:

1. **Find station codes**: Visit [www.velib-metropole.fr/map](https://www.velib-metropole.fr/map) to find the codes of the stations you want to monitor.

2. **Edit the script**: Open `VeliBar.php` in your text editor and locate the line starting with `$stationsCode =`. Replace the existing station codes with the ones you've chosen.

## License

This project is licensed under the MIT License. See the `LICENSE` file for more details.
