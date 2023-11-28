@extends('layouts.master')
@section('breadcrumb')
    <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-12">
                    <h4 class="fw-semibold mb-8">Đánh giá nhân viên</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a class="text-muted text-decoration-none" href="{{route('home')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">Đánh giá nhân viên</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="d-flex align-items-center gap-4 mb-4">
                <div class="position-relative">
                    <div class="border border-2 border-primary rounded-circle">
                        <img src="../assets/images/profile/user-1.jpg" class="rounded-circle m-1" alt="user1" width="60">
                    </div>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill text-bg-primary"> 3
                    <span class="visually-hidden">unread messages</span>
                  </span>
                </div>
                <div>
                    <h3 class="fw-semibold">Hi, <span class="text-dark">Johnathan</span>
                    </h3>
                    <span>Cheers, and happy activities - July 6 2023</span>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row pb-4">
                        <div class="col-lg-4 d-flex align-items-stretch">
                            <div class="d-flex flex-column align-items-start w-100">
                                <div class="text-start">
                                    <h5 class="card-title fw-semibold">Financial Income</h5>
                                    <span>Aug 1, 2023 - Nov 1, 2023</span>
                                </div>
                                <div class="mt-lg-auto mt-4 mb-4">
                          <span class="text-dark">Total Revenue <span class="text-success">+9.78%</span>
                          </span>
                                    <h2 class="mt-2 fw-bold">$8,240,00</h2>
                                    <span>Increased 15% from last month</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 d-flex align-items-stretch">
                            <div class="w-100">
                                <div class="d-md-flex align-items-start gap-3">
                                    <div>
                                        <h6 class="mb-0">Product Condition</h6>
                                        <div class="d-flex align-items-center gap-3">
                                            <h2 class="mt-2 fw-bold">75%</h2>
                                            <span class="badge text-bg-primary  px-2 py-1 d-flex align-items-center">
                                <i class="ti ti-chevron-down fs-4"></i>2.8% </span>
                                        </div>
                                    </div>
                                    <div class="ms-auto">
                                        <select class="form-select">
                                            <option value="1">March 2023</option>
                                            <option value="2">April 2023</option>
                                            <option value="3">May 2023</option>
                                            <option value="4">June 2023</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <div id="financial" style="min-height: 215px;"><div id="apexcharts4hi1prus" class="apexcharts-canvas apexcharts4hi1prus apexcharts-theme-light" style="width: 720px; height: 200px;"><svg id="SvgjsSvg1663" width="720" height="200" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg apexcharts-zoomable" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><foreignObject x="0" y="0" width="720" height="200"><div class="apexcharts-legend" xmlns="http://www.w3.org/1999/xhtml" style="max-height: 100px;"></div></foreignObject><rect id="SvgjsRect1668" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe"></rect><g id="SvgjsG1725" class="apexcharts-yaxis" rel="0" transform="translate(15.59375, 0)"><g id="SvgjsG1726" class="apexcharts-yaxis-texts-g"><text id="SvgjsText1728" font-family="Plus Jakarta Sans', sans-serif" x="20" y="31.4" text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="400" fill="#adb0bb" class="apexcharts-text apexcharts-yaxis-label "><tspan id="SvgjsTspan1729">160</tspan><title>160</title></text><text id="SvgjsText1731" font-family="Plus Jakarta Sans', sans-serif" x="20" y="64.0825" text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="400" fill="#adb0bb" class="apexcharts-text apexcharts-yaxis-label "><tspan id="SvgjsTspan1732">120</tspan><title>120</title></text><text id="SvgjsText1734" font-family="Plus Jakarta Sans', sans-serif" x="20" y="96.765" text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="400" fill="#adb0bb" class="apexcharts-text apexcharts-yaxis-label "><tspan id="SvgjsTspan1735">80</tspan><title>80</title></text><text id="SvgjsText1737" font-family="Plus Jakarta Sans', sans-serif" x="20" y="129.4475" text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="400" fill="#adb0bb" class="apexcharts-text apexcharts-yaxis-label "><tspan id="SvgjsTspan1738">40</tspan><title>40</title></text><text id="SvgjsText1740" font-family="Plus Jakarta Sans', sans-serif" x="20" y="162.13" text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="400" fill="#adb0bb" class="apexcharts-text apexcharts-yaxis-label "><tspan id="SvgjsTspan1741">0</tspan><title>0</title></text></g></g><g id="SvgjsG1665" class="apexcharts-inner apexcharts-graphical" transform="translate(33.59375, 30)"><defs id="SvgjsDefs1664"><clipPath id="gridRectMask4hi1prus"><rect id="SvgjsRect1670" width="659.8702697753906" height="146.73" x="-5" y="-8" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="forecastMask4hi1prus"></clipPath><clipPath id="nonForecastMask4hi1prus"></clipPath><clipPath id="gridRectMarkerMask4hi1prus"><rect id="SvgjsRect1671" width="656.8702697753906" height="134.73" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath></defs><line id="SvgjsLine1669" x1="0" y1="0" x2="0" y2="130.73" stroke="#b6b6b6" stroke-dasharray="3" stroke-linecap="butt" class="apexcharts-xcrosshairs" x="0" y="0" width="1" height="130.73" fill="#b1b9c4" filter="none" fill-opacity="0.9" stroke-width="1"></line><line id="SvgjsLine1689" x1="0" y1="131.73" x2="0" y2="137.73" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1690" x1="130.5740539550781" y1="131.73" x2="130.5740539550781" y2="137.73" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1691" x1="261.1481079101562" y1="131.73" x2="261.1481079101562" y2="137.73" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1692" x1="391.72216186523434" y1="131.73" x2="391.72216186523434" y2="137.73" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1693" x1="522.2962158203125" y1="131.73" x2="522.2962158203125" y2="137.73" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1694" x1="652.8702697753906" y1="131.73" x2="652.8702697753906" y2="137.73" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><g id="SvgjsG1685" class="apexcharts-grid"><g id="SvgjsG1686" class="apexcharts-gridlines-horizontal"><line id="SvgjsLine1696" x1="0" y1="32.6825" x2="652.8702697753906" y2="32.6825" stroke="rgba(0,0,0,0.1)" stroke-dasharray="3" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1697" x1="0" y1="65.365" x2="652.8702697753906" y2="65.365" stroke="rgba(0,0,0,0.1)" stroke-dasharray="3" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1698" x1="0" y1="98.04749999999999" x2="652.8702697753906" y2="98.04749999999999" stroke="rgba(0,0,0,0.1)" stroke-dasharray="3" stroke-linecap="butt" class="apexcharts-gridline"></line></g><g id="SvgjsG1687" class="apexcharts-gridlines-vertical"></g><line id="SvgjsLine1701" x1="0" y1="130.73" x2="652.8702697753906" y2="130.73" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line><line id="SvgjsLine1700" x1="0" y1="1" x2="0" y2="130.73" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line></g><g id="SvgjsG1688" class="apexcharts-grid-borders"><line id="SvgjsLine1695" x1="0" y1="0" x2="652.8702697753906" y2="0" stroke="rgba(0,0,0,0.1)" stroke-dasharray="3" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1699" x1="0" y1="130.73" x2="652.8702697753906" y2="130.73" stroke="rgba(0,0,0,0.1)" stroke-dasharray="3" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1724" x1="0" y1="131.73" x2="652.8702697753906" y2="131.73" stroke="#e0e0e0" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt"></line></g><g id="SvgjsG1672" class="apexcharts-line-series apexcharts-plot-series"><g id="SvgjsG1673" class="apexcharts-series" zIndex="0" seriesName="SellingxProduct" data:longestSeries="true" rel="1" data:realIndex="0"><path id="SvgjsPath1676" d="M 0 107.85225C16.3452709306868, 98.44249444500514, 87.07662017511149, 33.77123458122304, 130.57405395507814, 32.682500000000005S218.0035299579966, 97.26611506236173, 261.1481079101563, 101.31575S348.1991813933273, 57.466718502822246, 391.7221618652344, 57.194374999999994S478.78218010328254, 99.0009061716584, 522.2962158203126, 99.681625S632.840415642733, 67.17048420300394, 652.8702697753906, 61.279687499999994" fill="none" fill-opacity="1" stroke="rgba(250,137,107,0.85)" stroke-opacity="1" stroke-linecap="butt" stroke-width="3" stroke-dasharray="0" class="apexcharts-line" index="0" clip-path="url(#gridRectMask4hi1prus)" pathTo="M 0 107.85225C16.3452709306868, 98.44249444500514, 87.07662017511149, 33.77123458122304, 130.57405395507814, 32.682500000000005S218.0035299579966, 97.26611506236173, 261.1481079101563, 101.31575S348.1991813933273, 57.466718502822246, 391.7221618652344, 57.194374999999994S478.78218010328254, 99.0009061716584, 522.2962158203126, 99.681625S632.840415642733, 67.17048420300394, 652.8702697753906, 61.279687499999994" pathFrom="M -1 130.73 L -1 130.73 L 130.57405395507814 130.73 L 261.1481079101563 130.73 L 391.7221618652344 130.73 L 522.2962158203126 130.73 L 652.8702697753906 130.73" fill-rule="evenodd"></path><g id="SvgjsG1674" class="apexcharts-series-markers-wrap apexcharts-hidden-element-shown" data:realIndex="0"><g class="apexcharts-series-markers"><circle id="SvgjsCircle1745" r="0" cx="0" cy="0" class="apexcharts-marker wqaza6hln no-pointer-events" stroke="#ffffff" fill="#fa896b" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" default-marker-size="0"></circle></g></g></g><g id="SvgjsG1677" class="apexcharts-series" zIndex="1" seriesName="Followers" data:longestSeries="true" rel="2" data:realIndex="1"><path id="SvgjsPath1680" d="M 0 89.87687499999998C19.82197597244446, 83.67510950662053, 87.1450224920181, 51.06191715179844, 130.57405395507814, 49.02374999999999S218.29460951379517, 82.98402235076564, 261.1481079101563, 77.6209375S348.6565643737936, 11.894806156106469, 391.7221618652344, 16.341250000000002S481.3375651579337, 94.33210799139519, 522.2962158203126, 104.58399999999999S631.7560945237323, 85.40564362554991, 652.8702697753906, 81.70625" fill="none" fill-opacity="1" stroke="rgba(97,93,255,0.85)" stroke-opacity="1" stroke-linecap="butt" stroke-width="3" stroke-dasharray="0" class="apexcharts-line" index="1" clip-path="url(#gridRectMask4hi1prus)" pathTo="M 0 89.87687499999998C19.82197597244446, 83.67510950662053, 87.1450224920181, 51.06191715179844, 130.57405395507814, 49.02374999999999S218.29460951379517, 82.98402235076564, 261.1481079101563, 77.6209375S348.6565643737936, 11.894806156106469, 391.7221618652344, 16.341250000000002S481.3375651579337, 94.33210799139519, 522.2962158203126, 104.58399999999999S631.7560945237323, 85.40564362554991, 652.8702697753906, 81.70625" pathFrom="M -1 130.73 L -1 130.73 L 130.57405395507814 130.73 L 261.1481079101563 130.73 L 391.7221618652344 130.73 L 522.2962158203126 130.73 L 652.8702697753906 130.73" fill-rule="evenodd"></path><g id="SvgjsG1678" class="apexcharts-series-markers-wrap apexcharts-hidden-element-shown" data:realIndex="1"><g class="apexcharts-series-markers"><circle id="SvgjsCircle1746" r="0" cx="0" cy="0" class="apexcharts-marker wjbe6iz5y no-pointer-events" stroke="#ffffff" fill="#615dff" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" default-marker-size="0"></circle></g></g></g><g id="SvgjsG1681" class="apexcharts-series" zIndex="2" seriesName="Campaign" data:longestSeries="true" rel="3" data:realIndex="2"><path id="SvgjsPath1684" d="M 0 49.02374999999999C19.82197597244446, 55.22551549337944, 87.42947600291843, 93.92650993763824, 130.57405395507814, 89.87687499999998S217.79318320021386, 27.224793998670613, 261.1481079101563, 24.511875000000003S348.2081261482043, 74.2163438283416, 391.7221618652344, 73.535625S478.8140956652376, 21.78700160421241, 522.2962158203126, 20.426562500000003S633.4126178375527, 58.66844391538839, 652.8702697753906, 65.365" fill="none" fill-opacity="1" stroke="rgba(61,217,235,0.85)" stroke-opacity="1" stroke-linecap="butt" stroke-width="3" stroke-dasharray="0" class="apexcharts-line" index="2" clip-path="url(#gridRectMask4hi1prus)" pathTo="M 0 49.02374999999999C19.82197597244446, 55.22551549337944, 87.42947600291843, 93.92650993763824, 130.57405395507814, 89.87687499999998S217.79318320021386, 27.224793998670613, 261.1481079101563, 24.511875000000003S348.2081261482043, 74.2163438283416, 391.7221618652344, 73.535625S478.8140956652376, 21.78700160421241, 522.2962158203126, 20.426562500000003S633.4126178375527, 58.66844391538839, 652.8702697753906, 65.365" pathFrom="M -1 130.73 L -1 130.73 L 130.57405395507814 130.73 L 261.1481079101563 130.73 L 391.7221618652344 130.73 L 522.2962158203126 130.73 L 652.8702697753906 130.73" fill-rule="evenodd"></path><g id="SvgjsG1682" class="apexcharts-series-markers-wrap apexcharts-hidden-element-shown" data:realIndex="2"><g class="apexcharts-series-markers"><circle id="SvgjsCircle1747" r="0" cx="0" cy="0" class="apexcharts-marker woolfh4om no-pointer-events" stroke="#ffffff" fill="#3dd9eb" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" default-marker-size="0"></circle></g></g></g><g id="SvgjsG1675" class="apexcharts-datalabels" data:realIndex="0"></g><g id="SvgjsG1679" class="apexcharts-datalabels" data:realIndex="1"></g><g id="SvgjsG1683" class="apexcharts-datalabels" data:realIndex="2"></g></g><line id="SvgjsLine1702" x1="0" y1="0" x2="652.8702697753906" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine1703" x1="0" y1="0" x2="652.8702697753906" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line><g id="SvgjsG1704" class="apexcharts-xaxis" transform="translate(0, 0)"><g id="SvgjsG1705" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)"><text id="SvgjsText1707" font-family="Plus Jakarta Sans', sans-serif" x="0" y="159.73" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#adb0bb" class="apexcharts-text apexcharts-xaxis-label "><tspan id="SvgjsTspan1708">1-10 Aug</tspan><title>1-10 Aug</title></text><text id="SvgjsText1710" font-family="Plus Jakarta Sans', sans-serif" x="130.5740539550781" y="159.73" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#adb0bb" class="apexcharts-text apexcharts-xaxis-label "><tspan id="SvgjsTspan1711">11-20 Aug</tspan><title>11-20 Aug</title></text><text id="SvgjsText1713" font-family="Plus Jakarta Sans', sans-serif" x="261.1481079101562" y="159.73" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#adb0bb" class="apexcharts-text apexcharts-xaxis-label "><tspan id="SvgjsTspan1714">21-30 Aug</tspan><title>21-30 Aug</title></text><text id="SvgjsText1716" font-family="Plus Jakarta Sans', sans-serif" x="391.7221618652344" y="159.73" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#adb0bb" class="apexcharts-text apexcharts-xaxis-label "><tspan id="SvgjsTspan1717">1-10 Sept</tspan><title>1-10 Sept</title></text><text id="SvgjsText1719" font-family="Plus Jakarta Sans', sans-serif" x="522.2962158203125" y="159.73" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#adb0bb" class="apexcharts-text apexcharts-xaxis-label "><tspan id="SvgjsTspan1720">11-20 Sept</tspan><title>11-20 Sept</title></text><text id="SvgjsText1722" font-family="Plus Jakarta Sans', sans-serif" x="652.8702697753905" y="159.73" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#adb0bb" class="apexcharts-text apexcharts-xaxis-label "><tspan id="SvgjsTspan1723">21-30 Sept</tspan><title>21-30 Sept</title></text></g></g><g id="SvgjsG1742" class="apexcharts-yaxis-annotations"></g><g id="SvgjsG1743" class="apexcharts-xaxis-annotations"></g><g id="SvgjsG1744" class="apexcharts-point-annotations"></g><rect id="SvgjsRect1748" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe" class="apexcharts-zoom-rect"></rect><rect id="SvgjsRect1749" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe" class="apexcharts-selection-rect"></rect></g></svg><div class="apexcharts-tooltip apexcharts-theme-dark"><div class="apexcharts-tooltip-title" style="font-size: 12px;"></div><div class="apexcharts-tooltip-series-group" style="order: 1;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(250, 137, 107);"></span><div class="apexcharts-tooltip-text" style="font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label"></span><span class="apexcharts-tooltip-text-y-value"></span></div><div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div><div class="apexcharts-tooltip-series-group" style="order: 2;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(97, 93, 255);"></span><div class="apexcharts-tooltip-text" style="font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label"></span><span class="apexcharts-tooltip-text-y-value"></span></div><div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div><div class="apexcharts-tooltip-series-group" style="order: 3;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(61, 217, 235);"></span><div class="apexcharts-tooltip-text" style="font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label"></span><span class="apexcharts-tooltip-text-y-value"></span></div><div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div></div><div class="apexcharts-xaxistooltip apexcharts-xaxistooltip-bottom apexcharts-theme-dark"><div class="apexcharts-xaxistooltip-text" style="font-size: 12px;"></div></div><div class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-dark"><div class="apexcharts-yaxistooltip-text"></div></div></div></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="border-top">
                    <div class="row gx-0">
                        <div class="col-md-4 border-end">
                            <div class="p-4 py-3 py-md-4">
                                <p class="fs-4 text-danger mb-0">
                          <span class="text-danger">
                            <span class="round-8 text-bg-danger rounded-circle d-inline-block me-1"></span>
                          </span>Selling Product
                                </p>
                                <h3 class=" mt-2 mb-0">$3,350,00</h3>
                            </div>
                        </div>
                        <div class="col-md-4 border-end">
                            <div class="p-4 py-3 py-md-4">
                                <p class="fs-4 text-primary mb-0">
                          <span class="text-primary">
                            <span class="round-8 text-bg-primary rounded-circle d-inline-block me-1"></span>
                          </span>Followers
                                </p>
                                <h3 class=" mt-2 mb-0">1,500+</h3>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="p-4 py-3 py-md-4">
                                <p class="fs-4 text-info mb-0">
                          <span class="text-info">
                            <span class="round-8 text-bg-info rounded-circle d-inline-block me-1"></span>
                          </span>Campaign
                                </p>
                                <h3 class=" mt-2 mb-0">560</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

