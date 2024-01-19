# Web Engineering and Technologies Project: CaseAce Frontend

## Problem Statements
Managing legal cases, staff tasks, and client communications efficiently is a challenge for many law firms. Without an integrated system, firms may struggle with missing deadlines, tracking case details, or managing client information, resulting in inefficiencies, miscommunication, and delays. 

**CaseAce** is designed to simplify and streamline case management by providing a web-based solution that helps law firms manage staff tasks, track case deadlines, view detailed case information, and receive alerts for important events such as court dates.

## Project Overview
**CaseAce Frontend** is a web-based case and task management system designed specifically for law firms. It enables legal professionals to keep track of ongoing cases, deadlines, and client-related tasks with an intuitive and easy-to-use interface. The system allows law firm staff (partners and paralegals) to manage their workflow efficiently and stay informed about critical case dates such as court hearings and task deadlines.

The platform also provides a dashboard that gives a comprehensive view of all ongoing tasks and cases, helping the team stay on top of their responsibilities and ensure no important task is overlooked. The app also supports seamless document management, client tracking, and notifications for important dates.

Key features include case tracking, task management, document uploads, and custom reminders for key dates. Built with simplicity and scalability in mind, **CaseAce** is designed to adapt to a law firm's evolving needs. The goal is to simplify law firm operations, improve productivity, and ensure that all staff members are on the same page.

## System Objectives
- To develop a system for law firm staff to manage cases and managing their staffs in the cases.
- To develop a system for law firm staffs and their client to keep track of the tasks and documents required in the case assigned to them.
- To develop a system for law firm staffs and clients to track and receive alerts on important dates such as dates of court hearings that are tied to individual cases, as well as deadlines for tasks associated with the case.

## Key Features
- **Task Management:** Create, assign, and track tasks related to specific cases.
- **Case Tracking:** Easily view detailed information about each case, including status, deadlines, and associated tasks.
- **Client Management:** Manage client information and link them to relevant cases.
- **Staff Management:** Administrators (Partners) can manage staff roles and responsibilities across various cases.
- **Court Date & Deadline Alerts:** Receive notifications for important dates such as court hearings and task deadlines.
- **Responsive Design:** Optimized for both desktop and mobile devices, ensuring accessibility from anywhere.
- **Document Management:** Upload and manage case-related documents in one place.
- **User Roles:** Different user permissions for partners (administrators) and paralegals (staff), ensuring appropriate access to information.
- **Customizable Alerts:** Set alerts for specific dates and deadlines to keep staff on track.

## Technologies Used
- **HTML** for markup
- **PHP** for backend integration (includes)
- **CSS** for styling and layout
- **JavaScript** (optional, depending on frontend features used)

## Installation
This project is not open for public cloning or redistribution without prior written permission from the author as stated in ![LICENSE.md](LICENSE.md). If you would like to access this project, please reach out to the repository owner to request permission.

Once written permission is granted, you will receive detailed instructions on how to install and run the system, including all necessary steps and dependencies.

## Usage
Similar to the installation process, usage instructions will be provided only after written permission is granted to access this repository. Upon receiving access, you will be provided with step-by-step instructions on how to use this system/application, including on how to run the program, interact with it and exploring all the key features stated.

## System Requirements and Design
### User Modeling Diagram:
<p align="center">
<img src="readme-assets/01 User Modeling Diagram.png" alt="user modeling diagram"/>
<br>
<i>Figure 1: User modeling diagram for CaseAce</i>
</p>
Figure 1 shows the User Modeling Diagram for CaseAce. This diagram distinguishes types of users based on their access and rights. 

### Use Case Diagram
<p align="center">
<img src="readme-assets/02 Use Case Diagram.png" alt="use case diagram"/>
<br>
<i>Figure 2: Use case diagram for CaseAce</i>
</p>

### Class Diagram
<p align="center">
<img src="readme-assets/03 Class Diagram.png" alt="class diagram"/>
<br>
<i>Figure 3: Class diagram for CaseAce</i>
</p>

### Sequence Diagram
1. **Case Management Module**
    <p align="center">
    <img src="readme-assets/04 Sequence Diagram for “Create Case”.png" alt="sequence diagram for “create case”"/>
    <br>
    <i>Figure 4: Sequence diagram for “Create Case”</i>
    </p>
    In Figure 4 above, the sequence diagram illustrates the process of a lawyer (partners) creating a new case. When the user clicks on “Create Case” button, he will be directed to the “Create Case” page where he needs to fill up all the required case details and also assign lawyer(s) and paralegal(s) to handle the case. When the user clicks on the “submit” button, the data will be requested to be written to the database. If the request is successful, then the successful status is returned and the successful message is displayed to the user so that they can know that the case has been successfully created.<br><br>

2. **Customer Relation Management Module**
    <p align="center">
    <img src="readme-assets/05 Sequence Diagram for “View Lawyer Details”.png" alt="sequence diagram for “view lawyer details”"/>
    <br>
    <i>Figure 5: Sequence diagram for “View Lawyer Details”</i>
    </p>
    In Figure 5 above, the sequence diagram illustrates the process of a client viewing lawyer’s details. Users initiate this by requesting lawyer details, leading to the Website to retrieve the request to the law firm system. The law firm system will validate the request. If the request is accepted, it will retrieve the lawyer's details from the database and display them to the client.

3.  **Appointment Management Module**
    <p align="center">
    <img src="readme-assets/06 Sequence Diagram for “Create Appointment”.png" alt="sequence diagram for “create appointment”"/>
    <br>
    <i>Figure 6: Sequence diagram for “Create Appointment”</i>
    </p>
    In Figure 6 above, the sequence diagram illustrates the process of creating an appointment. Users initiate this by clicking the "New Appointment" button, leading to the display of an appointment form. Required information, such as invited persons, title, venue, date and time, and description, must be filled in. Subsequently, clicking the "Create" button triggers the system to send reminders or alerts to the invited persons, prompting them to check and respond to the appointment (accept or decline).

4.  **Task Management Module**
    <p align="center">
    <img src="readme-assets/07 Sequence Diagram for “Assign and View Tasks”.png" alt="sequence diagram for “assign and view tasks”"/>
    <br>
    <i>Figure 7: Sequence diagram for “Assign and View Tasks”</i>
    </p>
    In Figure 7 above, the sequence diagram illustrates the process of assigning, editing and deleting a task. The admin adds a task by clicking the "add edit or delete" button after selecting desired case, and then assigns it to the corresponding paralegals. Then the paralegals can see the tasks assigned by the admin.

5.  **Document Management Module**
    <p align="center">
    <img src="readme-assets/08 Sequence Diagram for “Request and Upload Documents”.png" alt="sequence diagram for “request and upload documents”"/>
    <br>
    <i>Figure 8: Sequence diagram for “request and upload documents”</i>
    </p>
    Figure 8 above show the sequence diagram for CaseAce. When a paralegal wants to request documents from client. He will open “Active Cases” to select desired case. Then, the system will return the case information stored in database. Then, paralegal can click “Request Document(s)” and enter the document details that requested and send the request to client side. When client received notification on request document, he will upload the requested document and the document will be stored on the database. When operation success, paralegal side will receive a notification on document uploaded successfully.

### Web Application Architecture Diagram
<p align="center">
<img src="readme-assets/09 Web Application Architecture Diagram.png" alt="web application architecture diagram"/>
<br>
<i>Figure 9: Web application architecture diagram</i>
</p>
Figure 9 shows the web application architecture design for “CaseAce”. The client will connect to Internet and access the application layer via their browsers. The application layer includes the web server to store the front-end files and the application server to store the back-end application to hide the business logic behind the system. For web server, we will host our front-end files on Vercel. For application server, we will host our back-end files on Heroku.<br><br>

The application layer will communicate with the database server to retrieve and save data to the database. The database we used is MongoDB to store data, Cloudinary to store media files like documents, photos, videos, etc.

## System Architecture Design
### System Design
This part provides a full explanation of the system's visual components as well as the design concepts that provide a pleasant user interface and good user experience.
#### User Interface (UI) Design
1.  **Name**
    <p align="center">
    <img src="readme-assets/10 Name of the System.png" alt="name of the system"/>
    <br>
    <i>Figure 10: Name of the system</i>
    </p>
    This system is called CaseAce (Figure 10). This name was chosen for many reasons. The term  "Case"  indicates legal issues and fits the system's focus on legal firm case management. It conveys the system's main goal. However, "Ace" often connotes quality and skill. Apart from that, "Ace" means high competence and ability. <br><br>
    When combined with "Case," it implies competent and authoritative legal management. Due to two short, distinct words, the name is easy to pronounce and remember. A catchy name can boost system brand recognition.  The platform successfully manages cases and prioritises efficiency and effectiveness. <br><br>

2.  **Logo**
    <p align="center">
    <img src="readme-assets/11 “CaseAce” Logo.png" alt="“caseace” logo"/>
    <br>
    <i>Figure 11: “CaseAce” logo</i>
    </p>
    Figure 11 shows the CaseAce logo. The “CaseAce” logo has scales, a letter ‘C' on the left, and a ‘A' on the right. Our logo's main colour is Navy-Blue (#1c277e).<br><br>
    The scales symbolise the law's fairness and balance. A timeless symbol of justice, fairness, and impartial evidence. It shows that every case is carefully considered and justice is balanced.<br><br>
    The letter 'C' blends into the scales to the left. Our focus is case management, hence the 'C' in "Case, from CaseAce". This visual anchor connects our brand to our core function.<br><br>
    A represents "Ace, from CaseAce" on the right side of the scales. This letter represents our dedication to providing top-notch legal solutions.<br><br>

3.  **Colours**
    <p align="center">
    <img src="readme-assets/12 The color palette following 60 30 10 rule.png" alt="the color palette following 60/30/10 rule"/>
    <br>
    <i>Figure 12: The color palette following 60/30/10 rule</i>
    </p>
    Figure 12 shows the system design color palette. Colors are mostly blue to show law firm professionalism. The 60/30/10 rule is strictly followed when designing “CaseAce” interface. This design rule is popular in user interface design. This rule can help balance and standardize UI visual hierarchy. It suggests distributing the color scheme 60/30/10. <br><br>
    Black/white is the main color for 60% of user interfaces. The primary background color provides a clean, neutral canvas for the system. The system background and text are white and black to provide high contrast and easy reading. <br><br>
    Navy-Blue (#1c277e) is used in 30% of user interface design. This color is used on buttons, navigation bars, and UI accents. This color contrasts well with white background. <br><br>
    Light Blue (#3480df) is used for the final 10% of user interface design. For accents or interactive elements like links. <br><br>

4. **Typography**<br><br>
    User interface designs use serif and sans-serif. The logo's serif font conveys elegance and tradition. Because serif fonts have decorative strokes at character ends, they convey formality and professionalism. This choice fits legal tradition and authority. <br><br>
    Designs use sans-serif Montserrat and Lato for headers and body text. <br><br>
    The header text is Montserrat, a clean, modern sans-serif font that works well for titles and headers. Its geometric shapes contrast with the logo's serif font and look modern and sophisticated. Montserrat is versatile and readable making it ideal for prominent text. <br><br>
    Lato, another sans-serif, is used for body text. For clear, approachable information, its simplicity and readability make it ideal.  Modern design favors sans-serif,  which improves paragraph and longer text legibility.

#### Layout and Iconography
1.  **Layout**
    <p align="center">
    <img src="readme-assets/13 The grid layout system of 12 columns.png" alt="the grid layout system of 12 columns"/>
    <br>
    <i>Figure 13: The grid layout system of 12 columns</i>
    </p>
    Figure 13 shows the 12-column grid. This project used grid layout to make our design cleaner and more organized. Divisions and widths are divided into 12 columns with a 10px margin. The smaller divisions can use the 12 columns in any width combination. 12 columns are chosen to give subdivisions more options. They can use 1/12, 2/12, 3/12, 4/12, 6/12, and 12/12 columns. This grid system uses percentage division width. It offers responsive system design.

2.  **Icons**
    <p align="center">
    <img src="readme-assets/14 The iOS16 Glyph icons.png" alt="the iOS16 Glyph icons"/>
    <br>
    <i>Figure 14: The iOS16 Glyph icons</i>
    </p>
    Icons8.com iOS 16 Glyph icons are shown in Figure 14. The system uses these icons for consistency, readability, and simplicity. These icons are chosen for their simple but elegant design which conveys formality and professionalism.

### System Module Overview
The system, CaseAce contained of 5 separated modules to make the management tasks in client law firm much more efficient and effective. Each group member will develop these modules. Each module serves different use cases and has different features for partners and associates (admins), paralegals (law firm staff), and clients. 
The System Module Diagram and PIC for each CaseAce module are shown in Figure 15.

**System Module Diagram:**
    <p align="center">
    <img src="readme-assets/15 System Module Diagram.png" alt="system module diagram"/>
    <br>
    <i>Figure 15: System module diagram</i>
    </p>

1.  **Client Relation Management (CRM) Module:**<br>
This module helps admins and law firms manage client relationships. Details in this module included:
    - **Manage clients’ information:** This system stores client contacts information and cases in a structured database. Law firm admins can easily view and update details in the dashboard.
    - **Check Client Interactions and Cases History:** This system stores clients' interactions, active status, and case history in a timeline so admin can easily review case status and progress.
    - **View Clients’ Satisfaction and Rating:** This system will ask clients to rate law firm services. Ratings are displayed on the admin dashboard.
2.  **Case Management Module:**<br>
This module mainly is for partners (admins) to assign suitable lawyer(s) and paralegals(s) to effectively handle certain client’s cases. The detailed features in this module are:
    - **Create Cases, Edit Cases Details:** Partners in law firm can create cases for each client case, and they are able to assign manpower to handle the case. Associates and partners both will be able to edit the case details.
    - **View Cases Details:** All users in the system can view the case details in their respective sites.
3.  **Document Management Module:**<br>
This module mainly is for system users to handle the documents uploaded or requested in each of their cases. The detailed features in this module are:
    - **Upload, Store and Request Documents:** System users can upload the documents into the system in respect of each case. The documents will be stored securely in the cloud storage online. Other than that, law firm can also request documents from their clients if they needed.
    - **View and Download Documents:** System users can view and download the desired documents in their case.
    - **Integration with Case Management:**  Ensures the seamless and streamlined workflow between document and case management.
4.   **Task Management Module:**<br>
This module mainly is for admins and paralegals to effectively manage the task distribution 
processes. The detailed features in this module are:
        - **Create, Assign, and Prioritize Task:** Admins can create the tasks, assign it to suitable staffs, and the staffs who received the task can prioritize the tasks.
        - **Deadline Tracking and Reminders:** System will send reminders and help staff to track their task if their tasks are close to deadlines or overdue.
        - **Monitor Progress:** System users can monitor the progress of completed and incomplete tasks in their respective dashboards.
5.   **Appointment Management Module:**<br>
This module mainly is for staffs to focus on scheduling and organizing appointments. As this 
contributes heavily to effective client engagement. The detailed features in this module are: 
        - **Appointment Scheduling and Calendar Integration:** Seamless scheduling and 
        integration with team calendars.
        - **Automated Reminders:** Timely reminders for upcoming, new, and cancelled 
        appointments, reducing the likelihood of oversights.
        - **Rescheduling   and   Cancellation   Functionalities:**   Flexibility   for   adjusting 
        appointments as needed.
        - **Availability and Workload Tracking:** Monitoring the availability and workload 
        of legal professionals to optimize scheduling.

## References
1. Aguilera, A. (2023, November 9). *Law practice management software: Ultimate Guide.* MyCase. https://www.mycase.com/blog/legal-case-management/law-practice-management-ultimate-guide/
2. Issacharoff, D. (2022, January 23). *20 key principles of Effective Web Design (2022)*. Elementor. https://elementor.com/blog/principles-of-website-design/<br>
3. McCuan, J. (2022, September 16). *What is task management? definitions & examples: Airtable blog.* For The Record. https://blog.airtable.com/what-is-task-management/.<br>
4. Shanaka, A. (2022, May 3). *What is system modeling and UML?*. Medium. https://medium.com/weekly-webtips/what-is-system-modeling-and-uml-441ac1d1f1ee <br>
5. User flow diagram — what it is, why it’s important, and how to create one. (n.d.). https://business.adobe.com/blog/basics/how-to-make-a-user-flow-diagram

## Appendices
<p align="center">
<img src="readme-assets/16 Small portion of CaseAce prototype.png" alt="small portion of CaseAce prototype"/>
<br>
<i>Figure 16: Small portion of CaseAce prototype</i>
</p>

<p align="center">
<img src="readme-assets/17 iOS16 Glyph icons used in CaseAce, from Icons8.com.png" alt="iOS16 Glyph icons used in CaseAce, from Icons8.com"/>
<br>
<i>Figure 17: iOS16 Glyph icons used in CaseAce, from Icons8.com</i>
</p>