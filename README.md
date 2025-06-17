# Dormitory Shower Reservation System

This project presents a web-based shower reservation platform developed to reduce congestion and improve hot water availability in shared university dormitories. The system was independently designed and implemented, and was successfully deployed and tested in a real dormitory setting at Yuan Ze University.

## Motivation

Shared bathroom environments often suffer from peak-hour congestion, unpredictable hot water availability, and inefficient usage. This project addresses these issues by allowing students to:

- Reserve shower time slots remotely
- Monitor real-time bathroom occupancy
- View estimated hot water temperatures before usage

The system aims to improve overall fairness and efficiency in daily dormitory life.

## System Architecture

- **Frontend**: HTML5, CSS3, JavaScript  
- **Backend**: PHP  
- **Database**: MySQL  
- **Asynchronous Communication**: AJAX

The system was hosted on a local dormitory server with full functionality.

## Entity-Relationship Model

![ER Model](assets/ermodel.svg)

- **User**
  - `SID`: Student ID
  - `bathroomID`: Assigned bathroom ID
  - `inBathroom`: Indicates whether the user is currently in the bathroom

- **Bathroom**
  - `bathroomID`: Unique ID for each bathroom
  - `checkInTime`: Timestamp when the bathroom is occupied
  - `checkOutTime`: Timestamp when the bathroom is released
  - `isBooked`: Indicates reservation status
  - `Temperature`: Current water temperature (simulated)

**Relationship**:  
Each user can book exactly one bathroom at a time, and each bathroom can be booked by exactly one user at a time.

## System Logic Flow

1. **Main Page Access**  
   - The system checks if the user already has a reservation.  
     - If true: The user may cancel the existing reservation.  
     - If false: The user is directed to the reservation interface.

2. **Reservation Interface**  
   - The user selects a bathroom from the list of available options.

3. **Bathroom Status**  
   - If the bathroom is already booked or occupied, the system informs the user.  
   - If the bathroom is available, the system displays the current water temperature and usage duration.

4. **Reservation Confirmation**  
   - If the bathroom is available, the reservation is recorded.  
   - If it is already booked, the user receives an alert message.

## Deployment and Evaluation

- Deployed in the male dormitory of Yuan Ze University
- More than 20 students participated in testing over a two-week period
- Average wait time reduced by approximately 40 percent based on log timestamps
- Informal feedback indicated significant improvements in fairness and usability

## Limitations

- System is tailored specifically for the layout and policies of Yuan Ze University dormitories
- Assumes a standardized 15-minute shower time per user
- Water temperature estimation is simulated and does not incorporate real-time environmental sensor data

## Demonstration

[Watch Demonstration Video](https://youtu.be/_1cHWwucBow)

## Author

Liu Tz-Yang (劉子揚)  
Department of Computer Science and Engineering  
Yuan Ze University
