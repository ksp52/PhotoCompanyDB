    $s = $_GET['sign'];
    $p = $_GET['price'];
    $task1 = "SELECT * FROM Customer WHERE LoginName IN (SELECT LoginName FROM Transaction GROUP BY LoginName HAVING (SUM(TotalAmount) ".$s.$p."))";

$q1 = $_GET['transid'];
    if (empty($q1)){
      $task2 = "SELECT * FROM Photo WHERE ISNULL(TransID)";
    }
    else {
      $task2 = "SELECT * FROM Photo WHERE TransID='".$q1."'";
    }

$task3 = "SELECT * FROM Customer WHERE LoginName IN (SELECT LoginName FROM Transaction WHERE TransID IN (SELECT TransID FROM Photo WHERE PhotoID IN (SELECT PhotoID FROM Models WHERE MName = '".$_GET['mname']."' AND MBDate = '".$_GET['mbdate']."'))HAVING COUNT(LoginName) =1) AND NOT EXISTS(SELECT Photo.TransID FROM Photo, Models WHERE Photo.PhotoID = Models.PhotoID AND ISNULL(Photo.TransID) AND MName = '".$_GET['mname']."' AND MBDate = '".$_GET['mbdate']."')";

$n = $_GET['nationality'];
    $task4 = "SELECT DISTINCT P1.* FROM Photographer P1, Photographer P2, Influences WHERE P1.PName = Influences.RPName AND P1.PBDate = Influences.RPBDate AND P2.PName = Influences.EPName AND P2.PBDate = Influences.EPBDate AND P2.PNationality = '".$n."' AND P1.PName NOT IN(SELECT DISTINCT P1.PName FROM Photographer P1, Photographer P2, Influences WHERE P1.PName = Influences.RPName AND P1.PBDate = Influences.RPBDate AND P2.PName = Influences.EPName AND P2.PBDate = Influences.EPBDate AND P2.PNationality <> '".$n."')";

    $ptype = $_GET['phototype'];
    if ($ptype == 'portrait'){
      $task5 = "SELECT DISTINCT P1.* FROM Photographer P1, Photo Ph1, (SELECT DISTINCT PhotoID FROM Models) port WHERE port.PhotoID = Ph1.PhotoID AND Ph1.PName = P1.PName AND Ph1.PBDate = P1.PBDate AND P1.PName NOT IN (SELECT DISTINCT P1.PName FROM Photographer P1, Photo Ph1, (SELECT DISTINCT PhotoID FROM Abstract UNION SELECT DISTINCT PhotoID FROM Landscape) nonport WHERE nonport.PhotoID = Ph1.PhotoID AND Ph1.PName = P1.PName AND Ph1.PBDate = P1.PBDate)";
    }
    elseif ($ptype == 'landscape'){
      $task5 = "SELECT DISTINCT P1.* FROM Photographer P1, Photo Ph1, (SELECT DISTINCT PhotoID FROM Landscape) land WHERE land.PhotoID = Ph1.PhotoID AND Ph1.PName = P1.PName AND Ph1.PBDate = P1.PBDate AND P1.PName NOT IN (SELECT DISTINCT P1.PName FROM Photographer P1, Photo Ph1, (SELECT DISTINCT PhotoID FROM Abstract UNION SELECT DISTINCT PhotoID FROM Models) nonland WHERE nonland.PhotoID = Ph1.PhotoID AND Ph1.PName = P1.PName AND Ph1.PBDate = P1.PBDate)";
    }
    elseif ($ptype == 'abstract'){
      $task5 = "SELECT DISTINCT P1.* FROM Photographer P1, Photo Ph1, (SELECT DISTINCT PhotoID FROM Abstract) abs WHERE abs.PhotoID = Ph1.PhotoID AND Ph1.PName = P1.PName AND Ph1.PBDate = P1.PBDate AND P1.PName NOT IN (SELECT DISTINCT P1.PName FROM Photographer P1, Photo Ph1, (SELECT DISTINCT PhotoID FROM Landscape UNION SELECT DISTINCT PhotoID FROM Models) nonabs WHERE nonabs.PhotoID = Ph1.PhotoID AND Ph1.PName = P1.PName AND Ph1.PBDate = P1.PBDate)";
    }

$s = $_GET['sign'];
    $nump = $_GET['numphotos'];
    $task6 = "SELECT T.* FROM Transaction T, (SELECT DISTINCT TransID, Count(*) FROM Photo GROUP BY TransID HAVING (COUNT(*) ".$s.$nump." )) c WHERE T.TransID = c.TransID";

$task7 = "SELECT DISTINCT Md.* FROM Model Md, (SELECT M1.* FROM Models M1 WHERE NOT EXISTS (SELECT P1.* FROM Photo P1 WHERE P1.PName = '".$_GET['pgname']."' AND P1.PBDate = '".$_GET['pgbdate']."' AND NOT EXISTS (SELECT DISTINCT MS2.* FROM Models MS2, (SELECT MS.* FROM Photo P, Models MS WHERE PName = '".$_GET['pgname']."' AND PBDate = '".$_GET['pgbdate']."' AND P.PhotoID = MS.PhotoID) ph WHERE ph.MName = MS2.MName AND ph.MBDate = MS2.MBDate AND MS2.PhotoID = P1.PhotoID AND M1.MName = MS2.MName AND M1.MBDate = MS2.MBDate))) tmp WHERE tmp.MName = Md.MName AND tmp.MBDate = Md.MBDate";

$task8 = "SELECT DISTINCT * FROM Photographer Ph, (SELECT PName, SUM(Price) AS TotalPicCost FROM Photo WHERE PName IS NOT NULL GROUP BY (PName) ORDER BY TotalPicCost DESC) p WHERE p.PName = Ph.PName";

      $task9 = "DELETE FROM Photo WHERE PhotoID = '".$_GET['photoID']."'";

      $task10 = "UPDATE Photo SET PName='".$_GET['pgname']."', PBDate='".$_GET['pgbdate']."' WHERE PhotoID='".$_GET['photoID']."'";

      $task11 = "SELECT * FROM Customer, (SELECT LoginName, SUM(TotalAmount) AS TotalSales FROM Transaction GROUP BY (LoginName)) ts WHERE ts.LoginName = Customer.LoginName";

$task12 = "SELECT Photographer.*, ts.TotalSales FROM Photographer, (SELECT PName, PBDate, SUM(Price) AS TotalSales FROM Photo GROUP BY (PName)) ts WHERE ts.PName = Photographer.PName ORDER BY PNAME ASC";

$task13 = "SELECT * FROM (SELECT 'Abstract' as Type, SUM(Photo.Price) AS TotalSales FROM Photo, Abstract WHERE Abstract.PhotoID = Photo.PhotoID AND Photo.TransID IS NOT NULL) ta UNION SELECT * FROM (SELECT 'Landscape' as Type, SUM(Photo.Price) AS TotalSales FROM Photo, Landscape WHERE Landscape.PhotoID = Photo.PhotoID AND Photo.TransID IS NOT NULL) tl UNION SELECT * FROM (SELECT 'Portrait' as Type, SUM(Photo.Price) AS TotalSales FROM Photo, Models WHERE Models.PhotoID = Photo.PhotoID AND Photo.TransID IS NOT NULL) tp";

      $task14 = "SELECT * FROM (SELECT TDate AS Date, SUM(Transaction.TotalAmount) AS TotalSales FROM Transaction GROUP BY (Date) ORDER BY TotalSales DESC) ts LIMIT ".$_GET['limit'];
