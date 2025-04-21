# Mars Rover Mission Simulator

A web-based simulator that translates commands sent from Earth to instructions understood by Mars rovers. The application handles rover movement, obstacle detection, and mission planning on a virtual Martian surface.

Live demo: [mars-rover.alejandrolaguna.dev](https://mars-rover.alejandrolaguna.dev)

## Features

- Control rovers with simple commands (F: forward, R: right, L: left)
- Navigate rovers on a grid representing the Martian surface
- Obstacle detection system that prevents rover damage
- Mission tracking and command logging
- User authentication system

## Project Requirements

The simulator fulfills the following mission control requirements:

- Rovers have an initial position (x,y) and direction (N,S,E,W)
- Rovers respond to command sequences like "FFRRFFFRL"
- Rovers can move forward and rotate left/right
- The surface is modeled as a grid
- Obstacle detection prevents collisions by aborting command sequences when necessary

## Technology Stack

Laravel + TailwindCSS + Vue3 (using InertiaJS)
