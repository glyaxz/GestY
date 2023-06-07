import 'package:flutter/material.dart';
import 'package:gesty/controllers/ProjectProvider.dart';
import 'package:gesty/models/Company.dart';
import 'package:gesty/models/Project.dart';
import 'package:gesty/resources/custom_loading_page.dart';
import 'package:get/get.dart';

class ProjectPage extends StatefulWidget {
  const ProjectPage({Key? key}) : super(key: key);

  @override
  State<ProjectPage> createState() => _ProjectPageState();
}

class _ProjectPageState extends State<ProjectPage> {
  Company company = Get.arguments['company'];
  late Size screenSize;
  ProjectProvider controller = ProjectProvider();

  @override
  void initState() {
    controller.getProjects(company.companyId);
    super.initState();
  }

  @override
  Widget build(BuildContext context) {
    // screenSize = MediaQuery.of(context).size;

    return Scaffold(
      appBar: AppBar(title: const Text('Empresas')),
      body: buildProjectPage(),
    );
  }

  Widget buildProjectPage() {
    return GetBuilder<ProjectProvider>(
      // init: ProjectProvider(),
      builder: (controller) {
        if (controller.loading) {
          // this.controller = controller;
          return SizedBox(
            height: screenSize.height,
            width: screenSize.width,
            child: Center(
              child: customLoadingPage(),
            ),
          );
        } else {
          this.controller = controller;
          return buildProjectList();
        }
      },
    );
  }

  Widget buildProjectList() {
    return SizedBox(
      height: screenSize.height,
      width: screenSize.width,
      child: GridView.builder(
        scrollDirection: Axis.vertical,
        gridDelegate: SliverGridDelegateWithFixedCrossAxisCount(
          crossAxisCount: ProjectProvider
              .columns, //<- esto es para cambiar el numero de columnas, pero si no le pones 2 y ya
          mainAxisExtent: 310,
          crossAxisSpacing: 10,
        ),
        itemCount: Get.find<ProjectProvider>().projects.length,
        itemBuilder: (context, index) => buildProjectCard(
            clickable: true,
            project: Get.find<ProjectProvider>().projects[index]),
      ),
    );
  }

  // Widget buildProjectList() {
  //   return SizedBox(
  //     height: screenSize.height,
  //     width: screenSize.width,
  //     child: Center(
  //       child: ListView.builder(
  //         itemCount: controller.companies.length,
  //         scrollDirection: Axis.vertical,
  //         padding: const EdgeInsets.only(bottom: 10),
  //         itemBuilder: (context, index) =>
  //             buildProjectCard(controller.companies[index]),
  //       ),
  //     ),
  //   );
  // }

  Widget buildProjectCard({bool? clickable, required Project project}) {
    return GestureDetector(
      child: Text(project.projectName),
      onTap: () {
        if (clickable ?? false) {
          Get.toNamed('/tasks', arguments: project);
        }
      },
    );
  }
}
