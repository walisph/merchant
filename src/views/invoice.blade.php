<table cellpadding="0" cellspacing="0" width="100%" height="100%" style="width:100%;height:100%;background:#ddd">
    <tbody>
        <tr valign="top">
            <td>
                <div style="padding:20px 40px;background:#333;">
<table align="center" cellpadding="0" cellspacing="0" width="600" style="width:600px;">
    <tbody>
        <tr>
            <td style="font-size:20px;color:#FFF;width:50%;font-family:'Century Gothic',CenturyGothic,AppleGothic,sans-serif;">
                {{ \Config::get('app.title') }}
            </td>
            <td style="font-size:12px;color:#6E6E6E;text-align:right;width:50%;font-family:'Century Gothic',CenturyGothic,AppleGothic,sans-serif;">
                Excluse Admin Access
            </td>
        </tr>
    </tbody>
</table>
                </div>
            </td>
        </tr>
        <tr valign="middle">
            <td>


<div style="margin-left:auto;margin-right:auto;background:#FFF;max-width:600px;width:100%;height:100%;">
    <div style="padding:20px">
        <h1 style="font-weight:100;letter-spacing:5px;font-family:'Century Gothic',CenturyGothic,AppleGothic,sans-serif;">NOTIFICATION</h1>
        <p style="font-size:14px;font-family:'Century Gothic',CenturyGothic,sans-serif;">
            A notification of <strong>Invoice</strong> has been generated and below is the information:
        </p>
        <hr />
        <p style="font-size:12px;font-family:'Century Gothic',CenturyGothic,sans-serif;">
            CUSTOMER INFORMATION
        </p>
        <table cellspacing="0" cellpadding="5" border="0" style="width:100%;padding:5px;border:2px solid #333;background:#ddd;">
            <tbody>
                <tr>
                    <td style="width:20%">
                        <p style="font-weight:bold;font-size:12px;text-align:right;font-family:'Century Gothic',CenturyGothic,sans-serif;">NAME</p>
                    </td>
                    <td style="width:80%">
                        <p style="font-size:10px;font-family:'Century Gothic',CenturyGothic,sans-serif;">
                            {{ $data['customer_data']['name'] }}
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:20%">
                        <p style="font-weight:bold;font-size:12px;text-align:right;font-family:'Century Gothic',CenturyGothic,sans-serif;">EMAIL</p>
                    </td>
                    <td style="width:80%">
                        <p style="font-size:10px;font-family:'Century Gothic',CenturyGothic,sans-serif;">
                            {{ $data['customer_data']['email'] }}
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:20%">
                        <p style="font-weight:bold;font-size:12px;text-align:right;font-family:'Century Gothic',CenturyGothic,sans-serif;">MESSAGE</p>
                    </td>
                    <td style="width:80%">
                        <div style="font-size:10px;font-family:'Century Gothic',CenturyGothic,sans-serif;">
                            {{ $data['customer_data']['message'] }}
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="width:20%">
                        <p style="font-weight:bold;font-size:12px;text-align:right;font-family:'Century Gothic',CenturyGothic,sans-serif;">PAYMENT</p>
                    </td>
                    <td style="width:80%">
                        <p style="font-size:10px;font-family:'Century Gothic',CenturyGothic,sans-serif;">
                            {{ $data['customer_data']['payment'] }}
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p style="font-size:12px;font-family:'Century Gothic',CenturyGothic,sans-serif;">
            PRODUCT INFORMATION
        </p>
        <table cellspacing="0" cellpadding="5" border="0" style="width:100%;padding:5px;border:2px solid #333;background:#ddd;">
            <tbody>
                <tr>
                    <td style="width:20%">
                        <p style="font-weight:bold;font-size:12px;text-align:right;font-family:'Century Gothic',CenturyGothic,sans-serif;">ID</p>
                    </td>
                    <td style="width:80%">
                        <p style="font-size:10px;font-family:'Century Gothic',CenturyGothic,sans-serif;">
                            {{ $data['product_data']['id'] }}
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:20%">
                        <p style="font-weight:bold;font-size:12px;text-align:right;font-family:'Century Gothic',CenturyGothic,sans-serif;">NAME</p>
                    </td>
                    <td style="width:80%">
                        <p style="font-size:10px;font-family:'Century Gothic',CenturyGothic,sans-serif;">
                            {{ $data['product_data']['name'] }}
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:20%">
                        <p style="font-weight:bold;font-size:12px;text-align:right;font-family:'Century Gothic',CenturyGothic,sans-serif;">DESCRIPTION</p>
                    </td>
                    <td style="width:80%">
                        <p style="font-size:10px;font-family:'Century Gothic',CenturyGothic,sans-serif;">
                            {{ $data['product_data']['description'] }}
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:20%">
                        <p style="font-weight:bold;font-size:12px;text-align:right;font-family:'Century Gothic',CenturyGothic,sans-serif;">PRICE</p>
                    </td>
                    <td style="width:80%">
                        <p style="font-size:10px;font-family:'Century Gothic',CenturyGothic,sans-serif;">
                            PHP{{ number_format( $data['product_data']['price']) }}.00
                        </p>
                    </td>
                </tr>

            </tbody>
        </table>
        <p style="font-size:12px;font-family:'Century Gothic',CenturyGothic,sans-serif;">
            INVOICE INFORMATION
        </p>
        <table cellspacing="0" cellpadding="5" border="0" style="width:100%;padding:5px;border:2px solid #333;background:#ddd;">
            <tbody>
                <tr>
                    <td style="width:20%">
                        <p style="font-weight:bold;font-size:12px;text-align:right;font-family:'Century Gothic',CenturyGothic,sans-serif;">ID</p>
                    </td>
                    <td style="width:80%">
                        <p style="font-size:10px;font-family:'Century Gothic',CenturyGothic,sans-serif;">
                            {{ $data['id'] }}
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:20%">
                        <p style="font-weight:bold;font-size:12px;text-align:right;font-family:'Century Gothic',CenturyGothic,sans-serif;">DATE</p>
                    </td>
                    <td style="width:80%">
                        <p style="font-size:10px;font-family:'Century Gothic',CenturyGothic,sans-serif;">
                            {{ $data['created_at'] }}
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:20%">
                        <p style="font-weight:bold;font-size:12px;text-align:right;font-family:'Century Gothic',CenturyGothic,sans-serif;">QUANTITY</p>
                    </td>
                    <td style="width:80%">
                        <p style="font-size:10px;font-family:'Century Gothic',CenturyGothic,sans-serif;">
                            {{ $data['quantity'] }}
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
        <hr />
        <p style="font-size:14px;font-family:'Century Gothic',CenturyGothic,sans-serif;">
            Please be advised that this message is for evaluation purpose and for administrators only.
        </p>
        <p style="font-size:14px;font-family:'Century Gothic',CenturyGothic,sans-serif;">
            Thank you and regards.
        </p>
    </div>
</div>



            </td>
        </tr>
        <tr valign="bottom">
            <td>

                <div style="padding:40px 0;background:#333;">
<table align="center" cellpadding="0" cellspacing="0" width="600" style="width:600px;">
    <tbody>
        <tr>
            <td style="color:#FFF;width:70%;font-family:'Century Gothic',CenturyGothic,AppleGothic,sans-serif;">
                <h2>{{ \Config::get('app.title') }}</h2>
                <h6 style="margin-bottom:0;font-weight:100;color:#ddd;">
                    CREATED AND DEVELOPED BY WALIS PHILIPPINES - {{ date('Y') }}
                    <br />
                    ALL RIGHTS RESERVED
                    <br />
                    &copy; {{ \Config::get('app.title') }} - {{ date('Y') }}
                </h6>
            </td>
            <td style="color:#6E6E6E;text-align:right;width:30%;font-family:'Century Gothic',CenturyGothic,AppleGothic,sans-serif;">
                <h2>&nbsp;</h2>
                <h6 style="margin-bottom:0;font-weight:100;color:#6E6E6E">
                    This is generate by the Walis Apps
                    <br />
                    Using Merchant Library
                </h6>
            </td>
        </tr>
    </tbody>
</table>
                </div>

            </td>
        </tr>
    </tbody>
</table>