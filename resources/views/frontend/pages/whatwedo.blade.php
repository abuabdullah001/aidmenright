@extends('frontend.masterTemp')

@section('fmenuname')
HOME
@endsection

@section('front-main-content')
<div class="clearfix"></div>

<style>
  .pt-10{;
  padding-top:10px;
}
section.sp-120{
  section-padding:120px;
}
h2.detail-title {
    border-left: 0px!important;
    text-align:center;
}

h2.detail-title {
    border-left: 0px!important;
    text-align: center!important;;
    background: transparent!important;
}

.border {
    margin-bottom: 30px!important;
    display: block;
    margin-top: -11px!important;
}


span.subborder {
    border-bottom: 1px solid #000;
    width: 100px;
    height: 10px;
    display: block;
    margin-bottom: 10px;
}

h2.detail-title.pt-5 {
    padding-top: 50px;
}


</style>


<section class="sp-120" style="background-color: rgb(255, 255, 255); ">
  <div class="container">
  <div class="row">
    <div class="col-md-12">
      <h2 class="detail-title"><strong>Environment and disaster management</strong> </h2>
      <div class="border" style="height: 2px;width:150px;background-color:black;margin:auto"></div>
    </div>
  </div><!-- row -->
  <div class="row d-flex pt-10">
    <div class="col-md-6">
      <p> Sustainable disaster risk management focuses on reducing environmental degradation while enhancing resilience to natural and human-made disasters.
      Key strategies include developing resilient infrastructure, promoting eco-friendly urban planning, and implementing early warning systems.
      Governments, NGOs, and communities must collaborate to adopt policies that protect ecosystems and mitigate risks. Sustainable resource management, reforestation, and renewable energy integration play crucial roles in disaster preparedness.
      </p>
      <p> Climate change is the defining issue of our time….every day we fail to act is a day that we
       step a little closer towards a fate that none of us wants- a fate that will resonate
       through generations in the damage done to humankind and life on earth.
       Weather-related hazards such as floods, storms, droughts, and rising sea levels disproportionately impact vulnerable populations, particularly in fragile and conflict-affected regions. In 2020 alone, 30.7 million new internal displacements were linked to environmental disasters.
       </p>
     </div>
     <div class="col-md-6">
      <img class="singleImg" src="{{asset('images/event/220.jpg')}}" alt="" style="height: 320px;width:100%;">
    </div>
  </div>
    <!-- row -->

    <div class="row">
    <div class="col-md-12">
      <h2 class="detail-title pt-5"><strong>Disaster Response</strong> </h2>
      <div class="border" style="height: 2px;width:150px;background-color:black;margin:auto"></div>
    </div>
  </div><!-- row -->
  <div class="row  d-flex  pt-10">
    <div class="col-md-6">
    <img class="singleImg" src="{{asset('images/event/221.jpg')}}" alt="" style="height: 320px;width:100%;">
     </div>
     <div class="col-md-6">
     <p> Disaster response refers to the immediate and coordinated efforts undertaken to address the impacts of natural or human-made disasters. It involves emergency actions aimed at saving lives, reducing suffering, and minimizing damage to property and the environment.
Governments, humanitarian organizations, and local communities work together to deliver timely assistance. Effective disaster response also includes early recovery efforts, helping affected populations transition from crisis to rebuilding, ensuring resilience against future disasters.
</p>
    </div>
  </div>
    <!-- row -->


    <div class="row">
    <div class="col-md-12">
      <h2 class="detail-title pt-5"><strong>Training</strong> </h2>
      <div class="border" style="height: 2px;width:150px;background-color:black;margin:auto"></div>
    </div>
  </div><!-- row -->
  <div class="row d-flex pt-10">
  <div class="col-md-6">
      <p>
        Disaster management training prepares individuals and organizations to effectively respond to emergencies such as earthquakes, floods, fires, and pandemics. It includes risk assessment, emergency response planning, evacuation drills, and first aid training. For example, during a fire drill in a workplace, employees practice safe evacuation procedures, learn how to use fire extinguishers, and understand emergency exits.
       </p>
    </div>
     <div class="col-md-6">
     <img class="singleImg" src="{{asset('images/event/222.jpg')}}" alt="" style="height: 320px;width:100%;">
    </div>
  </div>
    <!-- row -->

    <div class="row">
    <div class="col-md-12">
      <h2 class="detail-title pt-5"><strong>Cross Cutting Issues</strong> </h2>
      <div class="border" style="height: 2px;width:150px;background-color:black;margin:auto"></div>
    </div>
  </div><!-- row -->
  <div class="row d-flex pt-10">
    <div class="col-md-6">
    <img class="singleImg" src="{{asset('images/event/223.jpg')}}" alt="" style="height: 320px;width:100%;">
     </div>
     <div class="col-md-6">
      <p>Cross–cutting issues are those areas that affect all aspects of a programme that need special attention. Keeping the facts in Strategic Plan, We should working with the following areas which is covering major cross cutting issues of the organization is dealing with though different projects and programs.
      Child Protection in disaster management focuses on safeguarding children from harm, abuse, and exploitation during emergencies. Disasters like floods, earthquakes, and conflicts increase risks such as displacement, trafficking, and psychological trauma.
      Community engagement and accountability in disaster management ensure that affected communities actively participate in preparedness, response, and recovery efforts. It involves transparent communication, inclusive decision-making, and feedback mechanisms to address community needs effectively.
       </p>
    </div>
  </div>
    <!-- row -->

    <div class="row">
    <div class="col-md-12">
      <h2 class="detail-title pt-5"><strong>Planning and Development</strong> </h2>
      <div class="border" style="height: 2px;width:150px;background-color:black;margin:auto"></div>
    </div>
  </div><!-- row -->
  <div class="row d-flex pt-10">
    <div class="col-md-6">
      <p>
The Planning and Development department plays a vital role in driving organizational growth and improvement by ensuring the effective coordination of key initiatives across all areas.
Key areas of focus include expanding branches, strengthening financial management and sustainability, enhancing the skills and capacity of staff and volunteers, and advancing digital transformation. These efforts align with the organization’s strategic goals, aimed at building a stronger and more effective structure.

The department works towards improving management systems for efficient and accountable service delivery, while promoting volunteerism, social inclusion, humanitarian values, and adherence to International Humanitarian Law (IHL). Through collaboration with partners, the department is committed to capturing valuable lessons, co-developing new strategies, and applying insights to foster continuous growth and improvement.
      </p>
     </div>
     <div class="col-md-6">
     <img class="singleImg" src="{{asset('images/event/224.jpg')}}" alt="" style="height: 320px;width:100%;">
    </div>
  </div>
    <!-- row -->

    <div class="row">
    <div class="col-md-12">
      <h2 class="detail-title pt-5"><strong>Health</strong> </h2>
      <div class="border" style="height: 2px;width:150px;background-color:black;margin:auto"></div>
    </div>
  </div><!-- row -->
  <div class="row d-flex">
    <div class="col-md-6">
    <img class="singleImg" src="{{asset('images/event/225.jpg')}}" alt="" style="height: 320px;width:100%;">
     </div>
     <div class="col-md-6">
      <p> Healthcare systems play a critical role in disaster management by providing medical assistance, emergency response, and disease control during crises. It covers hospital preparedness, deployment of medical teams, resource allocation, and mental health support for disaster victims. Some Key Points are Mentioned below in brief.

Blood donation programs play a crucial role in disaster management by ensuring a sufficient blood supply for victims of natural disasters, accidents, and medical emergencies.

Health institutions play a crucial role in disaster management by providing medical care, emergency response, and disease control during crises. Hospitals, clinics, and medical teams ensure timely treatment for disaster victims, manage injuries, and prevent outbreaks.

Urban empowerment projects play a key role in disaster management by strengthening community resilience, improving infrastructure, and enhancing emergency preparedness.
       </p>
    </div>
  </div>
    <!-- row -->

    <div class="row">
    <div class="col-md-12">
      <h2 class="detail-title pt-5"><strong> Youth and Volunteers
      </strong> </h2>
      <div class="border" style="height: 2px;width:150px;background-color:black;margin:auto"></div>
    </div>
  </div><!-- row -->
  <div class="row d-flex pt-10">
    <div class="col-md-6">
      <p> Youth and volunteers play a vital role in disaster management by assisting in preparedness, response, and recovery efforts. Their energy, skills, and community connections help in emergency relief operations, such as distributing aid, conducting rescue missions, and raising awareness.

      For example, during floods or earthquakes, youth volunteers assist in evacuation, first aid, and rebuilding efforts.Training programs equip them with disaster response skills, making them valuable assets in crisis situations.

     </div>
     <div class="col-md-6">
     <img class="singleImg" src="{{asset('images/event/226.jpg')}}" alt="" style="height: 320px;width:100%;">
    </div>
  </div>
    <!-- row -->

    <div class="row">
    <div class="col-md-12">
      <h2 class="detail-title pt-5"><strong>Community Development </strong> </h2>
      <div class="border" style="height: 2px;width:150px;background-color:black;margin:auto"></div>
    </div>
  </div><!-- row -->
  <div class="row d-flex pt-10">
    <div class="col-md-6">
    <img class="singleImg" src="{{asset('images/event/230.jpeg')}}" alt="" style="height: 320px;width:100%;">
     </div>
     <div class="col-md-6">
      <p>Community development plays a vital role in disaster management by building resilience, enhancing preparedness, and fostering long-term recovery. It involves empowering communities to take an active role in disaster response, risk reduction, and reconstruction.

For example, local training programs teach individuals how to assess risks, create emergency plans, and establish early warning systems. Strengthening community infrastructure, such as schools, roads, and healthcare facilities, also improves disaster response capabilities.
       </p>
    </div>
  </div>
    <!-- row -->
 </div>
 </section>

@endsection
