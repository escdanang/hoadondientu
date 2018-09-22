<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-file-code-o text-blue"></i> <span>@Lang('slidebar.billManagement')</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-list text-blue"></i> @Lang('slidebar.billList')</a></li>
            <li><a href="#"><i class="fa fa-file-o text-blue"></i> @Lang('slidebar.createInvoice')</a></li>
            <li><a href="#"><i class="fa fa-list-alt text-blue"></i>  @Lang('slidebar.alternateInvoiceList')</a></li>
            <li><a href="#"><i class="fa fa-copy text-blue"></i> @Lang('slidebar.createAlternativeBill')</a></li>
            <li><a href="#"><i class="fa fa-th text-blue"></i> @Lang('slidebar.adjustmentBillList')</a></li>
            <li><a href="#"><i class="fa fa-copy text-blue"></i>  @Lang('slidebar.createInvoiceAdjustment')</a></li>
            <li><a href="#"><i class="fa fa-th-list text-blue"></i>  @Lang('slidebar.listOfDeleteBill')</a></li>
            <li><a href="#"><i class="fa fa-scissors text-blue"></i> @Lang('slidebar.createinvoicedelete')</a></li>
            <li><a href="#"><i class="fa fa-th-list text-blue"></i>  @Lang('slidebar.listofcanceledbills')</a></li>
            <li><a href="#"><i class="fa fa-clipboard text-blue"></i> @Lang('slidebar.createbillcancel')</a></li>
            <li><a href="#"><i class="fa fa-list-alt text-blue"></i>  @Lang('slidebar.listconversionbill')</a></li>
          </ul>
        </li>

        <li class="active treeview">
          <a href="#">
            <i class="fa fa-bar-chart text-blue"></i> <span>@Lang('slidebar.statisticalreport')</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-bar-chart text-blue"></i> @Lang('slidebar.report')</a></li>
            <li><a href="#"><i class="fa fa-building text-blue"></i> @Lang('slidebar.billstatement')</a></li>
            <li><a href="#"><i class="fa fa-tags text-blue"></i>@Lang('slidebar.statisticsbilllist')</a></li>
            
          </ul>
        </li>


        <li class="active treeview">
          <a href="#">
            <i class="fa fa-newspaper-o text-blue"></i> <span>@Lang('slidebar.Managebillform')</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-search text-blue"></i> @Lang('slidebar.search')</a></li>
            <li><a href="#"><i class="fa fa-list-alt text-blue"></i>  @Lang('slidebar.addnew')</a></li>
           
          </ul>
        </li>

         <li class="active treeview">
          <a href="#">
            <i class="fa fa-paper-plane text-blue"></i> <span>@Lang('slidebar.releasedecision')</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-search text-blue"></i> @Lang('slidebar.search')</a></li>
            <li><a href="#"><i class="fa fa-file-pdf-o text-blue"></i>@Lang('slidebar.makedecision')</a></li>
           
          </ul>
        </li>

        <li class="active treeview">
          <a href="#">
            <i class="fa fa-bell-o text-blue"></i> <span>@Lang('slidebar.releasenotice')</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa  fa-search text-blue"></i>@Lang('slidebar.search')</a></li>
            <li><a href="#"><i class="fa fa-file-pdf-o text-blue"></i>@Lang('slidebar.createreleasenotice')</a></li>
           
          </ul>
        </li>

        <li class="active treeview">
          <a href="#">
            <i class="fa fa-cogs text-blue"></i> <span>@Lang('slidebar.administratorlist')</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-credit-card text-blue"></i>@Lang('slidebar.deedmanagement')</a></li>
            <li><a href="#"><i class="fa fa-plus-circle text-blue"></i>@Lang('slidebar.configuremailserver')</a></li>
            <li> <a href="#"><i class="fa fa-plus-circle text-blue"></i>@Lang('slidebar.searchtaxdepartment')</a></li>
            <li><a href="#"><i class="fa fa-envelope-o text-blue"></i>@Lang('slidebar.searchemail')</a></li>
             <li ><a href="#"><i class="fa fa-list-alt text-blue"></i>@Lang('slidebar.officemanagement')</a></li>
            <li><a href="#"><i class="fa fa-user text-blue"></i>@Lang('slidebar.employeemanager')</a></li>
             <li><a href="/admin/customers/list"><i class="fa  fa-users text-blue"></i>@Lang('slidebar.customermanagement')</a></li>
            <li><a href="/admin/products/list"><i class="fa fa-life-ring text-blue"></i>@Lang('slidebar.productManagement')</a></li>
             <li><a href="#"><i class="fa fa-file-archive-o text-blue"></i>@Lang('slidebar.uploadbillmanagement')</a></li>
           
          </ul>
        </li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-bar-chart text-blue"></i> <span>@Lang('slidebar.listCompany')</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        </li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-bar-chart text-blue"></i> <span>Đăng kí mẫu hóa đơn</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-bar-chart text-blue"></i>Đăng kí sử dụng hóa đơn</a></li>
        </li>

      </ul>
        
    </section>
    <!-- /.sidebar -->
  </aside>