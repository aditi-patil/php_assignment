
## Robot Assignment

### Problem Statement:
As a user, I want a robot to clean apartments.The robot should charge its battery itself
once it runs out of energy.
#### Input command to run:

php main.php clean --floor=hard --area=21

Here --floor parameter should accept values as hard or carpet

#### Considerations:
1. In one charge, robot will clean floor till 60 seconds.
2. Robot battery will be fully charged in 30 seconds.
3. Robot can clean 1 m2 of hard floor in 1 second.
4. Robot can clean 1 m2 of carpet floor in 2 second.

#### Output will be like :-

Cleaning Hard floor area---

[ Cleaned area ---1 meter sq., BatteryStatus----98.33% ]

[ Cleaned area ---2 meter sq., BatteryStatus----96.66% ]

[ Cleaned area ---3 meter sq., BatteryStatus----94.99% ]

[ Cleaned area ---4 meter sq., BatteryStatus----93.32% ]

[ Cleaned area ---5 meter sq., BatteryStatus----91.65% ]

.
.

[ Cleaned area ---21 meter sq., BatteryStatus----64.93% ]

Cleanining task is completed