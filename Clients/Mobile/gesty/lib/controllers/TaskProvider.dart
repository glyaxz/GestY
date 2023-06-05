import 'package:gesty/models/Task.dart';
import 'package:gesty/services/task_api_service.dart';
import 'package:get/get.dart';

class TaskProvider extends GetxController {
  //Es el punto medio entre el consumer y el servicio, el cual recoge del servicio y parsea la información
  late int projectId;
  bool _loading = false;
  bool get loading => _loading;
  static int columns = 2;
  final RxList<Task> _tasks = <Task>[].obs;
  List<Task> get tasks => _tasks;

  void init(int projectid) {
    projectId = projectid;
    onInit();
  }

  @override
  void onInit() {
    getTasks(projectId);
    super.onInit();
  }

  void changeLoading(bool newState) {
    _loading = newState;
    update();
  }

  void setTasks(List<Task> newList) {
    _tasks.clear();
    _tasks.addAll(newList);
    update();
  }

  Future<void> getTasks(projectId) async {
    changeLoading(true);
    List<Task> aux = await TaskApiService.getTasks(projectId);
    setTasks(aux);
    changeLoading(false);
    update();
  }
}
