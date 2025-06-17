# Dormitory Shower Reservation System

This project introduces a web-based shower reservation platform designed to reduce congestion and improve hot water availability in university dormitories. The system allows students to remotely reserve shower slots, check real-time availability, and view estimated water temperatures, ultimately improving efficiency and convenience in daily campus life.

## Project Overview

This reservation system allows students to reserve shower slots remotely, view real-time bathroom availability, and check estimated water temperatures, significantly reducing waiting times and enhancing convenience in daily dormitory life.

## ER Model

The Entity-Relationship (ER) Model is structured as follows:

![ER Model](assets/ermodel.svg)

* **User**:

  * `SID`: Student ID
  * `bathroomID`: Assigned bathroom ID
  * `inBathroom`: Indicates whether the user is currently in the bathroom

* **Bathroom**:

  * `bathroomID`: Unique ID for each bathroom
  * `checkInTime`: Timestamp when the bathroom is occupied
  * `checkOutTime`: Timestamp when the bathroom is released
  * `isBooked`: Indicates reservation status
  * `Temperature`: Current water temperature

**Relationship**:

* `booking`: Each user can book exactly one bathroom at a time, and each bathroom can be booked by exactly one user at a time.

## System Logic Flow

The system's operation logic is as follows:

1. **Main Page Check**:

   * Checks if the user already has a reservation.

     * If `true`: Allows cancellation of existing reservation.
     * If `false`: Directs the user to reservation interface.

2. **Reservation Interface**:

   * Users select desired bathroom from available options.

3. **Bathroom Availability ("light" indicator)**:

   * If the bathroom is occupied or reserved (`false`): Notifies the user of the reservation.
   * If the bathroom is available (`true`): Shows the current status (water temperature and usage duration).

4. **Reservation Confirmation**:

   * Checks if the bathroom is available for reservation.

     * If `true`: Reservation is successful.
     * If `false`: Alerts the user that the bathroom is already reserved.

## Technologies Used

* **Frontend**: HTML5, CSS3, JavaScript
* **Backend**: PHP
* **Database**: MySQL
* **Real-Time Data Handling**: AJAX

## Limitations

* Specifically tailored to Yuan Ze University's male dormitory.
* Assumes a standardized shower time of 15 minutes per user.
* Water temperature estimations do not consider environmental variables.

## Demonstration

[Dormitory Shower Reservation System Demo Video](https://youtu.be/_1cHWwucBow)
