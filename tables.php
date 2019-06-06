$tbl_customer = "CREATE TABLE IF NOT EXISTS Customer (
        LoginName VARCHAR(255) NOT NULL,
        Password VARCHAR(255) NOT NULL,
        CName VARCHAR(255) NOT NULL,
        CType VARCHAR(50) NOT NULL,
        BillingAddress VARCHAR(255) NOT NULL,
        Str1 VARCHAR(255) NOT NULL,
        Str2 VARCHAR(255) NULL,
        City VARCHAR(255) NOT NULL,
        State VARCHAR(255) NOT NULL,
        Zip VARCHAR(5) NOT NULL,
        PRIMARY KEY (LoginName)
        )";

$tbl_transaction = "CREATE TABLE IF NOT EXISTS Transaction (
        TransID INT(11) NOT NULL AUTO_INCREMENT,
        TDate DATE NOT NULL,
        CardNo VARCHAR(50) NOT NULL,
        CardType VARCHAR(50) NOT NULL,
        CardExpDate DATE NOT NULL,
        TotalAmount DECIMAL(13, 2) NOT NULL,
        LoginName VARCHAR(255) NOT NULL,
        PRIMARY KEY (TransID),
        FOREIGN KEY (LoginName) REFERENCES Customer(LoginName) ON DELETE CASCADE ON UPDATE CASCADE
        )";

$tbl_location = "CREATE TABLE IF NOT EXISTS Location (
        Place VARCHAR(255) NOT NULL,
        Country VARCHAR(255) NOT NULL,
        Description VARCHAR(255) NULL,
		    PRIMARY KEY (Place, Country)
        )";

$tbl_photographer = "CREATE TABLE IF NOT EXISTS Photographer (
        PName VARCHAR(255) NOT NULL,
        PBDate DATE NOT NULL,
        PBio VARCHAR(255) NOT NULL,
        PAddress VARCHAR(255) NOT NULL,
        PNationality VARCHAR(255) NOT NULL,
        PRIMARY KEY (PName, PBDate)
        )";

$tbl_influences = "CREATE TABLE IF NOT EXISTS Influences (
        EPName VARCHAR(255) NOT NULL,
        EPBDate DATE NOT NULL,
        RPName VARCHAR(255) NOT NULL,
        RPBDate DATE NOT NULL,
        PRIMARY KEY (EPName, EPBDate, RPName, RPBDate),
        CONSTRAINT ephgr FOREIGN KEY (EPName, EPBDate) REFERENCES Photographer(PName, PBDate) ON DELETE CASCADE ON UPDATE CASCADE,
        CONSTRAINT rphgr FOREIGN KEY (RPName, RPBDate) REFERENCES Photographer(PName, PBDate) ON DELETE CASCADE ON UPDATE CASCADE
      ) ENGINE=INNODB";

$tbl_photo = "CREATE TABLE IF NOT EXISTS Photo (
        PhotoID INT(11) NOT NULL AUTO_INCREMENT,
        Speed VARCHAR(255) NOT NULL,
        Film VARCHAR(255) NOT NULL,
        FStop VARCHAR(255) NOT NULL,
        Color VARCHAR(255) NOT NULL,
        Resolution VARCHAR(255) NOT NULL,
        Price DECIMAL(13, 2) NOT NULL,
        Date DATE NULL,
        TransID INT(11) NULL,
        PName VARCHAR(255) NULL,
        PBDate DATE NULL,
		PRIMARY KEY (PhotoID),
        FOREIGN KEY (TransID) REFERENCES Transaction(TransID) ON DELETE CASCADE ON UPDATE CASCADE,
        CONSTRAINT pghr FOREIGN KEY (PName, PBDate) REFERENCES Photographer(PName, PBDate) ON DELETE CASCADE ON UPDATE CASCADE
             ) ENGINE=INNODB";

$tbl_landscape = "CREATE TABLE IF NOT EXISTS Landscape (
        PhotoID INT(11) NOT NULL,
        Place VARCHAR(255) NULL,
        Country VARCHAR(255) NULL,
		PRIMARY KEY (PhotoID),
        FOREIGN KEY (PhotoID) REFERENCES Photo(PhotoID) ON DELETE CASCADE ON UPDATE CASCADE
             )";

$tbl_abstract = "CREATE TABLE IF NOT EXISTS Abstract (
        PhotoID INT(11) NOT NULL,
        Comment VARCHAR(255) NULL,
        PRIMARY KEY (PhotoID),
        FOREIGN KEY (PhotoID) REFERENCES Photo(PhotoID) ON DELETE CASCADE ON UPDATE CASCADE
)";

$tbl_model = "CREATE TABLE IF NOT EXISTS Model (
        MName VARCHAR(255) NOT NULL,
        MBDate DATE NOT NULL,
        MBio VARCHAR(255) NOT NULL,
        MSex VARCHAR(1) NOT NULL,
        PRIMARY KEY (MName, MBDate)
        )";

$tbl_models = "CREATE TABLE IF NOT EXISTS Models (
        PhotoID INT(11) NOT NULL,
        MName VARCHAR(255) NOT NULL,
        MBDate DATE NOT NULL,
        Agency VARCHAR(255) NOT NULL,
        PRIMARY KEY (PhotoID, MName, MBDate),
        FOREIGN KEY (PhotoID) REFERENCES Photo(PhotoID) ON DELETE CASCADE ON UPDATE CASCADE,
        CONSTRAINT mdl FOREIGN KEY (MName, MBDate) REFERENCES Model(MName, MBDate) ON DELETE CASCADE ON UPDATE CASCADE
        )";

Execution:
$query = mysqli_query($db_conx, $tbl_customer);
if ($query === TRUE) {
    echo "<h3>customer table created OK :) </h3>";
} else {
    echo "<h3>customer table NOT created :( </h3>";
}

$query = mysqli_query($db_conx, $tbl_transaction);
if ($query === TRUE) {
    echo "<h3>transaction table created OK :) </h3>";
} else {
    echo "<h3>transaction table NOT created :( </h3>";
}

$query = mysqli_query($db_conx, $tbl_location);
if ($query === TRUE) {
    echo "<h3>location table created OK :) </h3>";
} else {
    echo "<h3>location table NOT created :( </h3>";
}

$query = mysqli_query($db_conx, $tbl_photographer);
if ($query === TRUE) {
    echo "<h3>photographer table created OK :) </h3>";
} else {
    echo "<h3>photographer table NOT created :( </h3>";
}
$query = mysqli_query($db_conx, $tbl_influences);
if ($query === TRUE) {
    echo "<h3>influences table created OK :) </h3>";
} else {
    echo "<h3>influences table NOT created :( </h3>";
}

$query = mysqli_query($db_conx, $tbl_photo);
if ($query === TRUE) {
    echo "<h3>photo table created OK :) </h3>";
} else {
    echo "<h3>photo table NOT created :( </h3>";
}

$query = mysqli_query($db_conx, $tbl_landscape);
if ($query === TRUE) {
    echo "<h3>landscape table created OK :) </h3>";
} else {
    echo "<h3>landscape table NOT created :( </h3>";
}

$query = mysqli_query($db_conx, $tbl_abstract);
if ($query === TRUE) {
    echo "<h3>abstract table created OK :) </h3>";
} else {
    echo "<h3>abstract table NOT created :( </h3>";
}

$query = mysqli_query($db_conx, $tbl_model);
if ($query === TRUE) {
    echo "<h3>model table created OK :) </h3>";
} else {
    echo "<h3>model table NOT created :( </h3>";
}

$query = mysqli_query($db_conx, $tbl_models);
if ($query === TRUE) {
    echo "<h3>models table created OK :) </h3>";
} else {
    echo "<h3>models table NOT created :( </h3>";
}
