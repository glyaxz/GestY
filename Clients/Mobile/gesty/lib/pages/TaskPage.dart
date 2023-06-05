import 'package:flutter/material.dart';
import 'package:gesty/controllers/TaskProvider.dart';
import 'package:gesty/models/Company.dart';
import 'package:gesty/models/Task.dart';
import 'package:gesty/resources/custom_loading_page.dart';
import 'package:get/get.dart';

class TaskPage extends StatefulWidget {
  const TaskPage({Key? key}) : super(key: key);

  @override
  State<TaskPage> createState() => _TaskPageState();
}

class _TaskPageState extends State<TaskPage> {
  Company company = Get.arguments['company'];
  late Size screenSize;
  TaskProvider controller = Get.find<TaskProvider>();

  @override
  Widget build(BuildContext context) {
    screenSize = MediaQuery.of(context).size;

    return Scaffold(
      appBar: AppBar(title: const Text('Empresas')),
      body: buildTaskPage(),
    );
  }

  Widget buildTaskPage() {
    return GetBuilder<TaskProvider>(
      init: TaskProvider(),
      builder: (controller) {
        if (controller.loading) {
          return SizedBox(
            height: screenSize.height,
            width: screenSize.width,
            child: Center(
              child: customLoadingPage(),
            ),
          );
        } else {
          return buildTaskList();
        }
      },
    );
  }

  Widget buildTaskList() {
    return Expanded(
      child: SizedBox(
        height: screenSize.height,
        width: screenSize.width,
        child: GridView.builder(
          scrollDirection: Axis.vertical,
          gridDelegate: SliverGridDelegateWithFixedCrossAxisCount(
            crossAxisCount: TaskProvider
                .columns, //<- esto es para cambiar el numero de columnas, pero si no le pones 2 y ya
            mainAxisExtent: 310,
            crossAxisSpacing: 10,
          ),
          itemCount: Get.find<TaskProvider>().tasks.length,
          itemBuilder: (context, index) =>
              buildTaskCard(task: Get.find<TaskProvider>().tasks[index]),
        ),
      ),
    );
  }

  // Widget buildTaskList() {
  //   return SizedBox(
  //     height: screenSize.height,
  //     width: screenSize.width,
  //     child: Center(
  //       child: ListView.builder(
  //         itemCount: controller.companies.length,
  //         scrollDirection: Axis.vertical,
  //         padding: const EdgeInsets.only(bottom: 10),
  //         itemBuilder: (context, index) =>
  //             buildTaskCard(controller.companies[index]),
  //       ),
  //     ),
  //   );
  // }

  Widget buildTaskCard({required Task task}) {
    return Text(task.taskName);
  }
}
