import Image from "next/image";

const page = () => {
  return (
    <div className="flex w-full flex-col gap-12 pt-[100px] bg-gray-100 ">
      <h1 className="text-center text-4xl font-bold ">About us</h1>

      <div className=" flex flex-col lg:flex-row gap-14 items-center justify-center lg:px-[130px]">
        <div className="flex lg:w-[460px] h-[400px]">
          <Image
            src="/knifeAndPistol.png"
            alt=""
            width={400}
            height={400}
            className=" object-cover"
          />
        </div>
        <div className=" flex flex-col gap-8 lg:w-[60%] px-10 bg-white py-20">
          <h2 className="text-3xl text-[#437D58] font-semibold">
            About Computer Vision Africa
          </h2>
          <p className="text-[#7A7A7A]">
            Computer Vision Africa is a visionary community dedicated to
            pioneering advancements in computer vision, machine learning, and
            artificial intelligence across Africa. As a diverse network of tech
            enthusiasts, researchers, and professionals, we are committed to
            unleashing the transformative power of AI to address the
            continent&#39;s unique challenges and drive sustainable growth.
            Through our shared passion, we aim to cultivate a dynamic ecosystem
            where innovation flourishes, knowledge is shared, and African talent
            leads the global AI landscape.
          </p>
        </div>
      </div>
      <div className="object-cover mt-14 lg:w-[1513px] h-[700px] ">
        <Image
          src="/fullcars.png"
          alt=""
          width={1500}
          height={700}
          className="lg:w-[1510px] h-[700px]"
        />
      </div>
      <div className=" flex flex-col lg:flex-row gap-14 px-[10px] items-center justify-center py-[60px]">
        <div className="flex flex-col gap-2 w-[512px] h-[488px] px-6 py-10 shadow-lg bg-white shadow-gray-300/50">
          <Image
            src="/arrow.png"
            alt=""
            width={70}
            height={70}
            className="ml-8"
          />
          <h1 className="text-[#365D47] text-2xl font-semibold mt-6">
            Our mission
          </h1>
          <p className="text-[#2B2B2B] leading-7">
            Our mission is to empower African talent by providing a robust
            platform for learning, collaboration, and practical experience in
            computer vision and AI. We believe in equipping individuals with
            industry-ready skills, fostering connections between academia,
            start-ups, and established companies, and catalyzing AI-driven
            solutions that make a tangible difference. Through workshops,
            mentorship, and community-driven projects, we nurture the next
            generation of African innovators and problem-solvers.
          </p>
        </div>
        <div className="flex flex-col gap-2 w-[512px] h-[488px] px-6 py-10 shadow-lg bg-white shadow-gray-300/50">
          <Image
            src="/head.png"
            alt=""
            width={70}
            height={70}
            className="ml-8"
          />
          <h1 className="text-[#365D47] text-2xl font-semibold mt-6">
            Our vission
          </h1>
          <p className="text-[#2B2B2B] leading-7">
            We envision an Africa recognized globally for its leadership in AI
            and computer vision, where technology is harnessed to uplift
            communities, bridge economic gaps, and advance human potential. By
            spearheading ethical, impactful AI applications that address
            critical societal needs—from healthcare to agriculture to
            education—we aim to redefine Africa&#39;s role on the world stage.
            Our vision is to create a continent-wide movement, uniting African
            minds to build a future powered by AI that reflects our values,
            creativity, and resilience.
          </p>
        </div>
      </div>
    </div>
  );
};

export default page;
