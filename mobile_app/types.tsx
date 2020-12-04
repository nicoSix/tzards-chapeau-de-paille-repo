import { GestureResponderEvent } from "react-native";

export type RootStackParamList = {
  Root: undefined;
  NotFound: undefined;
};

export type BottomTabParamList = {
  TabOne: undefined;
  TabTwo: undefined;
};

export type TabOneParamList = {
  TabOneScreen: undefined;
};

export type DrawerParamList = {
  Home: undefined;
  Sessions: undefined;
  SessionRecording: undefined;  
};

export type HomeParamList = {
  HomeScreen: undefined;
};

export type SessionsParamList = {
  SessionsScreen: undefined;
};

export type SessionRecordingParamList = {
  SessionRecordingScreen: undefined;
};

export type onPressFunc = (event: GestureResponderEvent) => void;
