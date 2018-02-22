<?php 
include "dao.php";
$i="0";
$resultfindCategory = mysqli_query($con,"SELECT  customer_profile.id as custId, loan_proposal.id as loanId, concat(customer_profile.first_name, ' ', customer_profile.middle_name, ' ', customer_profile.last_name) as name  , customer_profile.status, loan_proposal.loan_status, loan_proposal.tenure_of_loan * 12 as tenureMonths , loan_proposal.first_payment_date as firstEmi, emi_status.emi_date as lastEmi ,loan_ammortisation_schedule.balance as principleRemaining,loan_ammortisation_schedule.balance * 0.05 as forclosureCharges , loan_ammortisation_schedule.balance * 0.05 + loan_ammortisation_schedule.balance  as forclosureTotAmount
	 FROM customer_profile 
     INNER JOIN loan_proposal ON customer_profile.id = loan_proposal.customer_id
     INNER JOIN emi_status ON customer_profile.id = emi_status.customer_id
     INNER JOIN loan_ammortisation_schedule ON loan_proposal.customer_id = loan_ammortisation_schedule.loan_proposal_id 
     where customer_profile.status='Active' AND loan_proposal.loan_status='disbursement' AND emi_status.status!='REALISED' GROUP BY customer_profile.id  ORDER BY customer_profile.id DESC");

; 

while($row = mysqli_fetch_array($resultfindCategory))
	{

	$cat['serialNumber']=$i+1;
	$cat['custId']=$row['custId'];
	$cat['loanId']=$row['loanId'];
	 $cat['name']=$row['name'];
	 $cat['loan_status']=$row['loan_status'];
	 $cat['tenureMonths']=$row['tenureMonths'];
	 $cat['firstEmi']=$row['firstEmi'];
	 $cat['lastEmi']=$row['lastEmi'];
	 $cat['interestPending']=0;
	 $cat['EmiBounce']=0;
	 $cat['principleRemaining']=$row['principleRemaining'];
	 $cat['forclosureCharges']=$row['forclosureCharges'];
	 $cat['forclosureTotAmount']=$row['forclosureTotAmount'];
	 $cat_arr[$i]=$cat;
	$i=$i+1;
  }
   
     mysqli_close($con);
  header('Content-type: application/json');
  echo json_encode($cat_arr);
 


?>