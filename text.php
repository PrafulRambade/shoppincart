CREATE DEFINER=`root`@`localhost` PROCEDURE `add_customer`(customer_id int(11),customer_unique_id varchar(15),
customer_f_name varchar(50),customer_gstin varchar(20),customer_pan varchar(20),customer_address text,
customer_pincode varchar(15),customer_city varchar(50),customer_state int(11),customer_country int(11),
customer_office_tel varchar(20),customer_fax_no varchar(20),customer_email varchar(50),customer_mobile varchar(15),
customer_location	varchar(50),usr_id varchar(15))
BEGIN
	insert into customer_details(customer_id,customer_unique_id,customer_f_name,customer_gstin,customer_pan,customer_address,customer_pincode,customer_city,customer_state,customer_country,customer_office_tel,customer_fax_no,customer_email,customer_mobile,customer_location,customer_created_by,customer_created_ts,customer_changed_flag,customer_changed_by,customer_changed_ts) 
						values(customer_id,customer_unique_id,customer_f_name,customer_gstin,customer_pan,customer_address,customer_pincode,customer_city,customer_state,customer_country,customer_office_tel,customer_fax_no,customer_email,customer_mobile,customer_location,usr_id,CURRENT_TIMESTAMP,'NEW',usr_id,CURRENT_TIMESTAMP);
END

--------------------------------------------------------------------------------------

CREATE DEFINER=`root`@`localhost` PROCEDURE `add_customer`(customer_id int(11),customer_unique_id varchar(15),
customer_f_name varchar(50),customer_gstin varchar(20),customer_pan varchar(20),customer_address text,
customer_pincode varchar(15),customer_city varchar(50),customer_state int(11),customer_country int(11),
customer_office_tel varchar(20),customer_fax_no varchar(20),customer_email varchar(50),customer_mobile varchar(15),
customer_location	varchar(50),usr_id varchar(15))
BEGIN
	insert into customer_details(customer_id,customer_unique_id,customer_f_name,customer_gstin,customer_pan,customer_address,customer_pincode,customer_city,customer_state,customer_country,customer_office_tel,customer_fax_no,customer_email,customer_mobile,customer_location,customer_created_by,customer_created_ts,customer_changed_flag,customer_changed_by,customer_changed_ts) 
						values(customer_id,customer_unique_id,customer_f_name,customer_gstin,customer_pan,customer_address,customer_pincode,customer_city,customer_state,customer_country,customer_office_tel,customer_fax_no,customer_email,customer_mobile,customer_location,usr_id,CURRENT_TIMESTAMP,'NEW',usr_id,CURRENT_TIMESTAMP);
END

------------------------------------------------------------------------------------------------------

CREATE TABLE `customer_details` (
  `customer_id` int(11) NOT NULL,
  `customer_unique_id` varchar(15) NOT NULL,
  `customer_f_name` varchar(50) DEFAULT NULL,
  `customer_gstin` varchar(20) DEFAULT NULL,
  `customer_pan` varchar(20) DEFAULT NULL,
  `customer_address` text DEFAULT NULL,
  `customer_pincode` varchar(15) DEFAULT NULL,
  `customer_city` varchar(50) DEFAULT NULL,
  `customer_state` int(11) DEFAULT NULL,
  `customer_country` int(11) DEFAULT NULL,
  `customer_office_tel` varchar(20) DEFAULT NULL,
  `customer_fax_no` varchar(20) DEFAULT NULL,
  `customer_email` varchar(50) DEFAULT NULL,
  `customer_mobile` varchar(15) DEFAULT NULL,
  `customer_location` varchar(50) DEFAULT NULL,
  `customer_created_by` varchar(15) DEFAULT NULL,
  `customer_created_ts` datetime DEFAULT NULL,
  `customer_changed_flag` varchar(10) DEFAULT NULL,
  `customer_changed_by` varchar(15) DEFAULT NULL,
  `customer_changed_ts` datetime NOT NULL,
  `customer_deleted_by` varchar(15) DEFAULT NULL,
  `customer_deleted_ts` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


ALTER TABLE `customer_details`
  ADD PRIMARY KEY (`customer_id`,`customer_unique_id`,`customer_changed_ts`);


----------------------------------------------------------------------------------

CREATE TABLE `vendor_details` (
  `vendor_id` int(11) NOT NULL,
  `vendor_unique_id` varchar(15) NOT NULL,
  `vendor_f_name` varchar(50) DEFAULT NULL,
  `vendor_gstin` varchar(20) DEFAULT NULL,
  `vendor_pan` varchar(20) DEFAULT NULL,
  `vendor_address` text DEFAULT NULL,
  `vendor_pincode` varchar(15) DEFAULT NULL,
  `vendor_city` varchar(50) DEFAULT NULL,
  `vendor_state` int(11) DEFAULT NULL,
  `vendor_country` int(11) DEFAULT NULL,
  `vendor_office_tel` varchar(20) DEFAULT NULL,
  `vendor_fax_no` varchar(20) DEFAULT NULL,
  `vendor_email` varchar(50) DEFAULT NULL,
  `vendor_mobile` varchar(15) DEFAULT NULL,
  `vendor_location` varchar(50) DEFAULT NULL,
  `vendor_created_by` varchar(15) DEFAULT NULL,
  `vendor_created_ts` datetime DEFAULT NULL,
  `vendor_changed_flag` varchar(10) DEFAULT NULL,
  `vendor_changed_by` varchar(15) DEFAULT NULL,
  `vendor_changed_ts` datetime NOT NULL,
  `vendor_deleted_by` varchar(15) DEFAULT NULL,
  `vendor_deleted_ts` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `vendor_details`
  ADD PRIMARY KEY (`vendor_id`,`vendor_unique_id`,`vendor_changed_ts`);

----------------------------------------------------------------

$addData = DB::select('call add_customer(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',
            array(1,'VNR-1',$request->f_name,$request->gstin,$request->pan,
            $request->address,$request->pin_no,$request->city,$request->state,$request->country,
            $request->ofc_tel,$request->fax,$request->email,$request->mobile,$request->location,1));
        
--------------------------------------------------------------------

$addData = DB::select('call add_vendor(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',
            array(1,'VNR-1',$request->f_name,$request->gstin,$request->pan,
            $request->address,$request->pin_no,$request->city,$request->state,$request->country,
            $request->ofc_tel,$request->fax,$request->email,$request->mobile,$request->location,1));
           

